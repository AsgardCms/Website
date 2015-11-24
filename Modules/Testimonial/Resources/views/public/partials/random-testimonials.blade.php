<div class="row uniform 50%">
    <div class="12u">
        <h3>What other are saying</h3>
    </div>
</div>
<div class="row uniform 50%">
    <?php foreach ($randomTestimonials as $testimonial): ?>
        <div class="4u">
            "{{ $testimonial->content }}" - <a href="{{ $testimonial->url }}" target="_blank" style="font-style:italic;">{{ $testimonial->name }}</a>
        </div>
    <?php endforeach; ?>
</div>
