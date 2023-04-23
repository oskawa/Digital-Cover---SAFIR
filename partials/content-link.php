<?php if ($args['data']['url'] && $args['data']['title']) : ?>


    <a class="btn-stroke__arrow" href="<?php echo $args['data']['url']; ?>">
        <div class="btn-stroke"><?php echo $args['data']['title']; ?></div>
        <div class="button-link">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.1599 9.47264L4.23404 23.4683L0.670572 19.887L14.5965 6.02578L15.2403 5.385H14.332H4.01772V0.375H18.0163H21.7007H23.782V19.9221H18.8007V9.73714V8.8286L18.1599 9.47264Z" stroke="#FE460D" stroke-width="0.75" />
            </svg>
        </div>
    </a>

<?php
endif; ?>