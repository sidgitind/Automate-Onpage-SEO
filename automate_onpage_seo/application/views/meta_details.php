<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
// checked meta title exist in database or not

if($meta_title == null)
{ 
?>
<title>ThinkCerti | Helping you Excel in your Career</title>
<?php 
}
else {?>
<title><?php echo $meta_title; ?></title>
<?php 
}
//checked meta description exist in database or not
if($meta_description == null)
{?>
<meta name="description"
	content="Before you enrol in a course, it's important to choose the right course and the right Institute. That's exactly what ThinkCerti is for. We help you discover the top courses and the top-rated Institutes to enrol in. ">
<?php 
}
else{?>
<meta name="description" content="<?php echo $meta_description; ?>" />
<?php 
}
// checked meta keywords in database or not
if($meta_keywords == null)
{?>
<meta name="keywords"
	content="career, technologies, certifications, institutes, training, future technology, job">
<?php 
}
else{ ?>
<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
<?php 
}
$meta_og_title=$meta_twitter_title=$meta_title;
$meta_og_desc=$meta_twitter_desc=$meta_description;
?>
<!-- added meta og tags..-->
<?php if(!empty($meta_og_title)){?>
<meta property="og:title" content="<?php echo $meta_og_title;?>">
<?php }
if(!empty($meta_og_image)){?>
<meta property="og:image" content="<?php echo $meta_og_image;?>">
<?php }
if(!empty($meta_og_desc)){?>
<meta property="og:description" content="<?php echo $meta_og_desc;?>">
<?php } 
if(!empty($meta_twitter_title)){?>
<!-- added meta tags for twitter. -->
<meta name="twitter:title" content="<?php echo $meta_twitter_title;?>" />
 <?php }
 if(!empty($meta_twitter_desc)){?>
<meta name="twitter:description" content="<?php echo $meta_twitter_desc;?>" />
 <?php }
 if(!empty($meta_twitter_image)){?>
<meta name="twitter:image" content="<?php echo $meta_twitter_image;?>" />
<?php }?>
<meta name="robots" content="index, nofollow">
<meta name="web_author" content="ThinkCerti">
<meta name="language" content="English">
<!-- used css file name variable to load file...25-Feb-2019 -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- changed src path using online path, date : 15-3-2019 -->
</head>
<body>
<h1>Meta details are displayed on this page.Thank you!!!</h1>
</body>
</html>