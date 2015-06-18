<?php namespace App\Exceptions;

use Exception;
use Bugsnag\BugsnagLaravel\BugsnagExceptionHandler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException',
        'Illuminate\Session\TokenMismatchException',
        'Illuminate\Database\Eloquent\ModelNotFoundException',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (config('app.debug') === false) {
            return $this->handleExceptions($e);
        }

        return parent::render($request, $e);
    }

    private function handleExceptions($e)
    {
        if ($e instanceof TokenMismatchException) {
            return redirect()->back()->with('warning', 'Form open for too long, please try again.');
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->view('errors.'.'404');
        }
    }

}
