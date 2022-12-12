<div class="page-section relative">
  <div class="grid grid-cols-12 gap-5 content-center xl:container mx-auto p-6 relative">
    <div class="xl:col-span-10 xl:col-start-2 col-span-12">
      <div class="relative container mx-auto z-10 p-6">
        <div class="content-center">
          <div class="p-6 text-center">
            <h1 class="text-xl font-medium text-primary"><?php echo $title; ?></h1>
            <?php if($description): ?>
              <p class="mt-6 formatted"><?php echo $description; ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
      
      <div class="relative mx-auto z-10 pb-6">

          <?php if( have_rows('q_and_a') ): ?>
          <div class="accordion" id="accordionExample">
            <?php while( have_rows('q_and_a') ): ?>
            <?php (the_row()); ?> 
            
              <div class="accordion-item">
                <h2 class="accordion-header mb-2 bg-light p-6 relative">
                  <button class="
                    accordion-button
                    relative
                    flex
                    items-center
                    w-full
                    text-left
                    font-medium
                    border-0
                    rounded-sm
                    transition
                    focus:outline-none
                    text-primary
                    text-xl
                  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <?php echo e(the_sub_field('question')); ?>

                    
                    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="21" class="absolute top-0 right-0 c-down"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 416c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L224 338.8l169.4-169.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-192 192C240.4 412.9 232.2 416 224 416z"/></svg>

                    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="21" class="absolute top-0 right-0 c-up"><!--! Font Awesome Pro 6.1.2 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 352c-8.188 0-16.38-3.125-22.62-9.375L224 173.3l-169.4 169.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25C432.4 348.9 424.2 352 416 352z"/></svg>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body p-6 formatted">
                    <?php echo e(the_sub_field('answer')); ?>

                  </div>
                </div>
              </div>   

            <?php endwhile; ?>
          </div>
          <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php /**PATH C:\xampp\htdocs\imagen3\wp-content\themes\imagen-practice-sage\resources\views/components/faq-list.blade.php ENDPATH**/ ?>