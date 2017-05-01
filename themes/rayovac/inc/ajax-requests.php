<?php
//função ajax para exibir condôminos na página inicial
function getCities()
{
	$args = array();
	$id_state   = $_POST['id_state'];
	$id_city 	= $_POST['id_city'];
	
	// busca por estado
	$args['post_type']	= 'lojas';
	
	$args['meta_query']	= array(
		'relation' => 'AND',
		array(
			'key'	=> 'estado',
			'value'	=> $id_state
		)
	);
    
	//incluir busca por cidade
	if($id_city != ''){
		$args['meta_query']	= array(
			'relation' => 'AND',
			array(
				'key'	=> 'estado',
				'value'	=> $id_state
			),
			array(
				'key'	=> 'cidade',
				'value'	=> $id_city,
				'type'    => 'text'
			)
		);
	}
	
	$args['meta_key']		= 'cidade';
    $args['orderby']		= 'meta_value';
    $args['order']			= 'ASC';
	$args['posts_per_page'] = -1;

	
	$posts = new WP_Query( $args ); 
	//print_r($posts); die();
	$html = '';
	
	if($posts->have_posts()){
		$array[] = '<option value="">Escolha sua cidade</option>';
				
		$i=0; while ( $posts->have_posts() ) { $posts->the_post();
			$array[] = '<option value="'.get_field('cidade', $post->ID).'">'.get_field('cidade', $post->ID).'</option>';
						
			$html .= '<div class="col-md-6">';
    
			$html .= '<h2>'.get_field('cidade', $post->ID).'</h2>';			

            $html .= '<h3>'.get_the_title().'</h3>';
								
			$array_fone = get_field('telefones', $post->ID);
			foreach($array_fone as $fone){
				if(!empty($fone['telefone'])){
					$html .= '<p>fone: <a target="_blank" href="tel: '.clean_phone($fone['telefone']).'">'.Mask("(##) ####-#####",clean_phone($fone['telefone'])).'</a></p>'; 
				}
			}

			if(get_field('site', $post->ID)){
				$html .= '<p>site: <a target="_blank" href="'.get_field('site', $post->ID).'">'.get_field('site', $post->ID).'</a></p>';
			}

			$html .= '</div>';
			
			if($i%2){ $html .= '<div class="clearfix"></div>'; };    

		$i++;}
		$select = print_r(array_unique($array));
	}else{
		$select = '<option>não há lojas neste estado</option>';
		$html 	= '<div class="col-md-12"><h2>Nenhuma loja encontrada</h2></div>';
	}
	
	echo $result = $select . '|+|' . $html;
	
    die();
}
//Adiciona a funcao extra votos aos hooks ajax do WordPress.
add_action('wp_ajax_getCities', 'getCities');
add_action('wp_ajax_nopriv_getCities', 'getCities');

function getPosts()
{
	
	$cat = $_POST['cat'];
	$page = $_POST['page'];

	$args = array();
	$args['post_type'] 			= 'post';
	if($cat != 'all'){ $args['category_name'] = $cat; }
	$args['posts_per_page'] 	= 6;
	$args['offset']				= $page;
		
	$posts = new WP_Query( $args ); 
	
	if ( $posts->have_posts() ) :
		?>
        
        <div class="row">
		
        <?php
		// Start the loop.
		while ( $posts->have_posts() ) : $posts->the_post();
		?>
		
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<a href="<?php the_guid(); ?>"><?php the_post_thumbnail('min-img', array('class' => 'img-responsive')); ?></a>
					</div>
					<div class="col-sm-12 col-md-6 content">
							<?php $category = get_the_category( $id ); ?>
							<span class="type"><?php echo $category[0]->cat_name; ?></span>
							<span class="title"><?php the_title(); ?></span>
							
							<a href="<?php the_guid(); ?>"><p class="desc"><?php echo mb_strimwidth(( get_the_content() ), 0, 100, '[...]'); ?></p></a>
					</div>
				</div>
			</div>
		   
	   <?php endwhile; ?>
       
       </div>
	   
	   <?php
	   else :
	   		echo '<div class="col-md-12 finish_posts text-center"><h2>não há mais posts<h2></div>';
	   endif;
	
    die();
}
//Adiciona a funcao aos hooks ajax do WordPress.
add_action('wp_ajax_getPosts', 'getPosts');
add_action('wp_ajax_nopriv_getPosts', 'getPosts');

function getFaq()
{

	$args = array();
	
	$cat = array(
		'taxonomy' => 'category_prod',
		'field' => 'slug',
		'terms' => $_POST['cat'],
	);
	$args['tax_query'] 	= array($cat);
	$args['post_type']	= 'faq';
	$args['order']		= 'ASC';
	
	$posts = new WP_Query( $args ); 
	
	if ( $posts->have_posts() ) :
	// Start the loop.
	?>
    
        <div class="row">
            <div class="col-sm-6 col-md-offset-1 col-md-5 indice">
                <?php
                    // Start the loop.
                    $i=1; while ( $posts->have_posts() ) : $posts->the_post();
                        echo '<h4 class="item_faq" data-indice="'.$i.'">'.$i.'. '.get_the_title().'</h3>';
                    $i++; endwhile;
                ?>
            </div>
        
            <div class="col-sm-6 col-md-5 respostas">
                <?php
                    // Start the loop.
                    $i=1; while ( $posts->have_posts() ) : $posts->the_post();
						echo '<div id="item-'.$i.'" class="item">';
							echo '<div class="faq_answer">'.$i.'. '.get_the_title().'</div>';
							echo '<p>'.the_field('resposta').'</p>';
						echo '</div>';	
                    $i++; endwhile;
                ?>
            </div>

            <div id="label" class="col-md-10 col-md-offset-1"></div>
            
            <div id="result" class="col-md-10 col-md-offset-1"></div>
        </div>
        
	<?php

    else :
		echo '<div class="col-md-12 finish_posts text-center"><h2>não há perguntas para esta categoria<h2></div>';
    endif;
	
	die();
}
//Adiciona a funcao aos hooks ajax do WordPress.
add_action('wp_ajax_getFaq', 'getFaq');
add_action('wp_ajax_nopriv_getFaq', 'getFaq');
?>