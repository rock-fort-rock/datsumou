<?php
/*
Template Name: OEM・ODM事業->主要お取引先
*/
?>
<?php
$status = [
	'id' => 'oemodm',
	'description' => '主なお取引先様を紹介します。',
	'localPage' => 'client',
];
?>
<?php get_header(); ?>
<?php
$logotypeArray = [];
while(the_repeater_field('client_logo')){
	$logotypeTemp = [];
	$logotypeTemp['title'] =  get_sub_field('client_logo_title');
	$logotypeClient = [];
	while(the_repeater_field('client_logo_set')){
		$logotypeClientTemp = [];
		$logotypeClientTemp['name'] = get_sub_field('client_logo_name');
		$imgObj = get_sub_field('client_logo_logo');
		$logotypeClientTemp['img'] = $imgObj['sizes']['medium_large'];
		$logotypeClientTemp['link'] = get_sub_field('client_logo_link');
		array_push($logotypeClient, $logotypeClientTemp);
	}
	$logotypeTemp['client'] = $logotypeClient;
	array_push($logotypeArray, $logotypeTemp);
}

$texttypeArray = [];
while(the_repeater_field('client_text')){
	$texttypeTemp = [];
	$texttypeTemp['title'] =  get_sub_field('client_text_title');
	$texttypeClient = [];
	while(the_repeater_field('client_text_set')){
		$texttypeClientTemp = [];
		$texttypeClientTemp['name'] = get_sub_field('client_text_name');
		$texttypeClientTemp['link'] = get_sub_field('client_text_link');
		array_push($texttypeClient, $texttypeClientTemp);
	}
	$texttypeTemp['client'] = $texttypeClient;
	array_push($texttypeArray, $texttypeTemp);
}
// print_r($texttypeArray);
?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/oem-odm/">OEM・ODM事業</a></li><li>主要お取引先</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">主要お取引先</h2>
					<h1 class="textHeader__desc">主なお取引先様を紹介します。</h1>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('oem-odm/local-navi'); ?>
				<div class="mainContents">
					<div class="client centeringContainer">
						<?php foreach($logotypeArray as $value): ?>
						<div class="contentBlock">
							<h3 class="client__category">[ <?php echo $value['title']; ?> ]</h3>
							<ul class="client__logoType">
								<?php foreach($value['client'] as $client): ?>
								<li>
									<?php if($client['link']): ?><a href="<?php echo $client['link']; ?>" target="_blank"><?php endif; ?>
									<?php if($client['img']): ?><img src="<?php echo $client['img']; ?>"><?php endif; ?>
									<p><?php echo $client['name']; ?></p>
									<?php if($client['link']): ?></a><?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endforeach; ?>

						<?php foreach($texttypeArray as $value): ?>
						<div class="contentBlock">
							<h3 class="client__category">[ <?php echo $value['title']; ?> ]</h3>
							<ul class="client__textType">
								<?php foreach($value['client'] as $client): ?>
								<li>
									<?php if($client['link']): ?><a href="<?php echo $client['link']; ?>" target="_blank"><?php endif; ?>
									<?php echo $client['name']; ?>
									<?php if($client['link']): ?></a><?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php get_template_part('oem-odm/footer-link'); ?>
		</div>

<?php get_footer(); ?>
