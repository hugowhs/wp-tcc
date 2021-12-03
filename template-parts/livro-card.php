<div class="cell medium-3">
    <div class="card livro-card">
        <div class="card-section">
            <div class="livro-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
            </div>
        </div>

        <div class="card-section">
            <h4 class="livro-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

            <?php
                $terms = get_the_terms( $_POST, 'genero' );

                $term = $terms[0]->name;
            ?>

            <p class="livro-genero"><?php echo $term; ?></p>

            <div class="livro-button">
              <a href="<?php the_permalink(); ?>" class="button">Mais Detalhes</a>
            </div>
        </div>
    </div>		
</div>