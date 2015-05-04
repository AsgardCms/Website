<?php namespace Modules\Entry\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Entry\Entities\Activation;
use Modules\Entry\Entities\Entry;
use Modules\Entry\Events\EntryAppliedToBeta;
use Modules\Entry\Events\EntryWasInvited;
use Modules\Entry\Repositories\EntryRepository;

class EloquentEntryRepository extends EloquentBaseRepository implements EntryRepository
{
    private $hashKey = '10b185ca-2a02-4fb8-bfa8-2861c254ee92';

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function subscribe($email)
    {
        $entry = $this->model->create(compact('email'));

        event(new EntryAppliedToBeta($entry));

        return $entry;
    }

    public function notAccepted($limit = 50)
    {
        return $this->model->where('accepted', '!=', 1)->orderBy('created_at')->take($limit)->get();
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }

    /**
     * Invite the given entry
     * @param object $entry
     * @return bool
     */
    public function invite($entry)
    {
        $entry->accepted = 1;
        $entry->save();

        $this->createNewActivationForEntry($entry, $this->createNewToken($entry->email));

        event(new EntryWasInvited($entry));

        return $entry;
    }

    private function createNewToken($email)
    {
        $value = str_shuffle(sha1($email.spl_object_hash($this).microtime(true)));

        return hash_hmac('sha1', $value, $this->hashKey);
    }

    /**
     * @param $entry
     * @param $token
     */
    private function createNewActivationForEntry($entry, $token)
    {
        $activation = new Activation();
        $activation->code = $token;
        $activation->entry_id = $entry->id;
        $activation->completed = 0;
        $activation->save();
    }

    /**
     * Count amount of entries
     * @return int
     */
    public function countAll()
    {
        return $this->model->count();
    }

    /**
     * Count all entries not invited yet
     * @return int
     */
    public function countTotalNotInvited()
    {
        return $this->model->where('accepted', 0)->count();
    }

    /**
     * Count all entries that are accepted and have completed the invitation
     * @return int
     */
    public function countAcceptedAndCompleted()
    {
        return $this->model->whereAccepted(1)->whereHas('activation', function (Builder $q) {
            $q->where('completed', 1);
        })->count();
    }
}
