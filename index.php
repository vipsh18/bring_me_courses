<?php
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);
	return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="referrer" content="origin-when-crossorigin" />
	<meta name="description" content="" />
	<meta name="author" content="Vipul Sharma" />

	<title>Home &#8226; Bring Me Courses</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans|Fira+Code">

	<!-- site css -->
	<link rel="stylesheet" href="./utils/css/common.css">
	<link rel="stylesheet" href="./utils/css/index.css">
	<!-- site css -->

	<!-- <link rel="icon" href="./resources/images/bmc_xicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="./resources/images/favicon.ico" type="image/x-icon"> -->
</head>

<body>
	<div class="fbc container tc">
		<header>
			<div class="header__text-box pb-2">
				<h1 class="heading-primary">
					<a href="http://localhost/bring_me_courses/" class="heading-primary--main">Bring Me Courses</a>
					<span class="heading-primary--sub">A Learner's Paradise</span>
				</h1>
			</div>
		</header>

		<form action="" method="GET">
			<input type="search" name="q" id="q" required minlength="1" title="Search For Course" placeholder="Search For Course">
			<button type="submit" id="search_btn" class="p-1">Search</button>
		</form>

		<div class="search_results">
			<?php
			if (isset($_REQUEST['q'])) {
				$search = test_input($_REQUEST['q']);
				include './database/database_connection_init.php';

				//get the search results
				$res = $conn->prepare("SELECT course_title, course_website, course_videos, course_tags, course_year, course_university, course_level FROM courses WHERE course_title REGEXP :search OR course_tags LIKE :srch");
				$res->bindValue(':search', '\s?' . $search . '\s', PDO::PARAM_STR);
				$res->bindValue(':srch', '%' . $search . '%', PDO::PARAM_STR);
				$res->execute();
				echo '<div class="fs-16 tal">';
				if ($res->rowCount() > 0)
					echo 'Search results for (and including) <b>' . $search . '</b> :';
				else
					echo 'No results found for ' . $search;
				while ($srch_res = $res->fetch(PDO::FETCH_ASSOC)) {
					echo '<div class="fs-15 mb-1 mt-1">';
					echo '<b>Link To Course: </b><a href="' . $srch_res['course_website'] . '" target="_blank">' . $srch_res['course_title'] . '</a><br>';
					//
					if ($srch_res['course_videos'] != null) {
						$c_vids = explode(", ", $srch_res['course_videos']);
						echo '<b>Course Videos: </b>';
						foreach ($c_vids as $vid)
							echo '<a href="' . $vid . '" target="_blank">' . $vid . '</a><br>';
					}
					//
					if ($srch_res['course_year'] != null) echo '<b>Course Year: </b>' . $srch_res['course_year'] . '<br>';
					//
					if ($srch_res['course_university'] != null) echo '<b>Course University: </b>' . $srch_res['course_university'] . '<br>';
					//
					if ($srch_res['course_level'] != null) echo '<b>Course Level: </b>' . $srch_res['course_level'];
					echo '</div><hr>';
				}
				echo '</div>';
			}
			?>
		</div>

		<div class="tag_btns_div">
			<div class="fs-16 mb-1"><b>Search using tags =></b></div>
		</div>

		<footer>
			Bring Me Courses is a platform that brings together free courses from different domains and bundles them up to provide a time-saving way for accessing educative content. <br>Email more courses at <a href="mailto:vipulsharma9696@gmail.com">vipulsharma9696@gmail.com</a> <br> Made by Vipul Sharma &#169; 2021
		</footer>
	</div>
	<script src="./utils/js/index.js"></script>
	<!--close php conn !-->
	<?php $conn = null; ?>
</body>

</html>