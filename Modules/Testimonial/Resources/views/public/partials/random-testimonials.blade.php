<div class="box">
    <?php if ($randomTestimonials->count() !== 0): ?>
    <div class="row uniform 50%">
        <div class="12u">
            <h3 style="text-align: center">What other are saying</h3>
        </div>
    </div>
    <div class="row uniform 50%">
        <?php foreach ($randomTestimonials as $testimonial): ?>
        <div class="4u" style="text-align: center">
            {!! $testimonial->content !!} - <a href="{{ $testimonial->url }}" target="_blank" style="font-style:italic;">{{ $testimonial->name }}</a>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
