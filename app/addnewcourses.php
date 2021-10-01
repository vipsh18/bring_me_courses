<?php
include '../database/database_connection_init.php';

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = test_input($_POST['title']);
	$site = test_input($_POST['site']);
	$vid = test_input($_POST['vid']);
	$dom = test_input($_POST['dom']);
	$tags = test_input($_POST['tags']);
	$tags = explode(",", $tags);
	$tags = implode(", ", $tags);
	$yr = test_input($_POST['yr']);
	$uni = test_input($_POST['univ']);
	$lvl = test_input($_POST['lvl']);

	$res = $conn->prepare("INSERT INTO courses(course_title, course_website, course_videos, course_domain, course_tags, course_year, course_university, course_level, course_added) VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW())");
	$res->bindParam(1, $title, PDO::PARAM_STR);
	$res->bindParam(2, $site, PDO::PARAM_STR);
	$res->bindParam(3, $vid, PDO::PARAM_STR);
	$res->bindParam(4, $dom, PDO::PARAM_STR);
	$res->bindParam(5, $tags, PDO::PARAM_STR);
	$res->bindParam(6, $yr, PDO::PARAM_STR);
	$res->bindParam(7, $uni, PDO::PARAM_STR);
	$res->bindParam(8, $lvl, PDO::PARAM_STR);

	if ($res->execute()) echo "Pushed";
	else echo "Err";
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

	<title>Add New Courses &#8226; Bring Me Courses</title>
	<link rel="stylesheet" href="../utils/css/addnewcourses.css">
</head>

<body>
	<form action="" method="POST">
		<input type="text" name="title" required minlength="1" placeholder="Title">
		<input type="text" name="site" required minlength="1" placeholder="Site">
		<input type="text" name="vid" minlength="1" placeholder="Videos">
		<input type="text" name="dom" required minlength="1" maxlength="50" placeholder="Domain" value="CS">
		<input type="text" name="lvl" minlength="1" maxlength="50" placeholder="Level">
		<input type="text" name="tags" required minlength="1" placeholder="Tags" autocomplete="on" id="tags">
		<!--  -->
		<input type="checkbox" name="tg" id="co" value="Computer Organization">
		<label for="co">Computer Organization</label>
		<input type="checkbox" name="tg" id="cc" value="Computing Concepts">
		<label for="cc">Computing Concepts</label>
		<input type="checkbox" name="tg" id="iocs" value="Intro to Computer Science">
		<label for="iocs">Intro to Computer Science</label>
		<input type="checkbox" name="tg" id="ai" value="Artificial Intelligence">
		<label for="ai">Artificial Intelligence</label>
		<input type="checkbox" name="tg" id="py" value="Python">
		<label for="py">Python</label>
		<input type="checkbox" name="tg" id="ds" value="Data Structures">
		<label for="ds">Data Structures</label>
		<input type="checkbox" name="tg" id="algo" value="Algorithms">
		<label for="algo">Algorithms</label>
		<input type="checkbox" name="tg" id="prog" value="Programming">
		<label for="prog">Programming</label>
		<input type="checkbox" name="tg" id="oop" value="Oop">
		<label for="oop">Oop</label>
		<input type="checkbox" name="tg" id="java" value="Java">
		<label for="java">Java</label>
		<input type="checkbox" name="tg" id="sp" value="Systems Programming">
		<label for="sp">Systems Programming</label>
		<input type="checkbox" name="tg" id="netp" value="Network Programming">
		<label for="netp">Network Programming</label>
		<input type="checkbox" name="tg" id="conc" value="Concurrency">
		<label for="conc">Concurrency</label>
		<input type="checkbox" name="tg" id="proc" value="Processors">
		<label for="proc">Processors</label>
		<input type="checkbox" name="tg" id="os" value="Operating Systems">
		<label for="os">Operating Systems</label>
		<input type="checkbox" name="tg" id="comp" value="Compilers">
		<label for="comp">Compilers</label>
		<input type="checkbox" name="tg" id="sql" value="SQL">
		<label for="sql">SQL</label>
		<input type="checkbox" name="tg" id="flsk" value="Flask">
		<label for="flsk">Flask</label>
		<input type="checkbox" name="tg" id="webd" value="Web Development">
		<label for="webd">Web Development</label>
		<input type="checkbox" name="tg" id="lsp" value="Lisp">
		<label for="lsp">Lisp</label>
		<input type="checkbox" name="tg" id="probs" value="Problem Solving">
		<label for="probs">Problem Solving</label>
		<input type="checkbox" name="tg" id="oc" value="Objective C">
		<label for="oc">Objective C</label>
		<input type="checkbox" name="tg" id="cs" value="C#">
		<label for="cs">C#</label>
		<input type="checkbox" name="tg" id="bsl" value="Beginner Student Language">
		<label for="bsl">Beginner Student Language</label>
		<input type="checkbox" name="tg" id="rckt" value="Racket">
		<label for="rckt">Racket</label>
		<input type="checkbox" name="tg" id="pp" value="Programming Paradigms">
		<label for="pp">Programming Paradigms</label>
		<input type="checkbox" name="tg" id="pyg" value="Pygame">
		<label for="pyg">Pygame</label>
		<input type="checkbox" name="tg" id="gd" value="Game Development">
		<label for="gd">Game Development</label>
		<input type="checkbox" name="tg" id="c" value="C">
		<label for="c">C</label>
		<input type="checkbox" name="tg" id="cpp" value="C++">
		<label for="cpp">C++</label>
		<input type="checkbox" name="tg" id="fp" value="Functional Programming">
		<label for="fp">Functional Programming</label>
		<input type="checkbox" name="tg" id="das" value="Data Science">
		<label for="das">Data Science</label>
		<input type="checkbox" name="tg" id="numpy" value="Numpy">
		<label for="numpy">Numpy</label>
		<input type="checkbox" name="tg" id="scipy" value="Scipy">
		<label for="scipy">Scipy</label>
		<input type="checkbox" name="tg" id="bootcamp" value="Bootcamp">
		<label for="bootcamp">Bootcamp</label>
		<input type="checkbox" name="tg" id="jupyter" value="Jupyter">
		<label for="jupyter">Jupyter</label>
		<input type="checkbox" name="tg" id="ipython" value="IPython">
		<label for="ipython">IPython</label>
		<input type="checkbox" name="tg" id="ee" value="Electrical Engineering">
		<label for="ee">Electrical Engineering</label>
		<input type="checkbox" name="tg" id="se" value="Software Engineering">
		<label for="se">Software Engineering</label>
		<input type="checkbox" name="tg" id="memm" value="Memory Management">
		<label for="memm">Memory Management</label>
		<input type="checkbox" name="tg" id="rust" value="Rust">
		<label for="rust">Rust</label>
		<input type="checkbox" name="tg" id="distsys" value="Distributed Systems">
		<label for="distsys">Distributed Systems</label>
		<input type="checkbox" name="tg" id="cn" value="Computer Networks">
		<label for="cn">Computer Networks</label>
		<input type="checkbox" name="tg" id="dbms" value="Database Systems">
		<label for="dbms">Database Systems</label>
		<input type="checkbox" name="tg" id="procsql" value="Procedural SQL">
		<label for="procsql">Procedural SQL</label>
		<input type="checkbox" name="tg" id="verc" value="Version Control">
		<label for="verc">Version Control</label>
		<input type="checkbox" name="tg" id="dynap" value="Dynamic Programming">
		<label for="dynap">Dynamic Programming</label>
		<input type="checkbox" name="tg" id="deepl" value="Deep Learning">
		<label for="deepl">Deep Learning</label>
		<input type="checkbox" name="tg" id="bayesnet" value="Bayesian Networks">
		<label for="bayesnet">Bayesian Networks</label>
		<input type="checkbox" name="tg" id="reasoning" value="Reasoning">
		<label for="reasoning">Reasoning</label>
		<input type="checkbox" name="tg" id="ml" value="Machine Learning">
		<label for="ml">Machine Learning</label>
		<input type="checkbox" name="tg" id="rl" value="Reinforcement Learning">
		<label for="rl">Reinforcement Learning</label>
		<input type="checkbox" name="tg" id="supl" value="Supervised Learning">
		<label for="supl">Supervised Learning</label>
		<input type="checkbox" name="tg" id="unsupl" value="Unsupervised Learning">
		<label for="unsupl">Unsupervised Learning</label>
		<input type="checkbox" name="tg" id="nn" value="Neural Networks">
		<label for="nn">Neural Networks</label>
		<input type="checkbox" name="tg" id="svm" value="Support Vector Machines">
		<label for="svm">Support Vector Machines</label>
		<input type="checkbox" name="tg" id="octave" value="Octave">
		<label for="octave">Octave</label>
		<input type="checkbox" name="tg" id="nlp" value="Natural Language Processing">
		<label for="nlp">Natural Language Processing</label>
		<input type="checkbox" name="tg" id="nlu" value="Natural Language Understanding">
		<label for="nlu">Natural Language Understanding</label>
		<input type="checkbox" name="tg" id="asr" value="Automatic Speech Recognition">
		<label for="asr">Automatic Speech Recognition</label>
		<input type="checkbox" name="tg" id="dgn" value="Generative Models">
		<label for="dgn">Generative Models</label>
		<input type="checkbox" name="tg" id="markm" value="Markov Models">
		<label for="markm">Markov Models</label>
		<input type="checkbox" name="tg" id="regr" value="Regression">
		<label for="regr">Regression</label>
		<input type="checkbox" name="tg" id="datam" value="Data Mining">
		<label for="datam">Data Mining</label>
		<input type="checkbox" name="tg" id="pgm" value="Probabilistic Graphical Methods">
		<label for="pgm">Probabilistic Graphical Methods</label>
		<input type="checkbox" name="tg" id="seqm" value="Sequence Modeling">
		<label for="seqm">Sequence Modeling</label>
		<input type="checkbox" name="tg" id="tf" value="Tensorflow">
		<label for="tf">Tensorflow</label>
		<input type="checkbox" name="tg" id="cv" value="Computer Vision">
		<label for="cv">Computer Vision</label>
		<input type="checkbox" name="tg" id="facr" value="Facial Recoginition">
		<label for="facr">Facial Recoginition</label>
		<input type="checkbox" name="tg" id="aws" value="AWS">
		<label for="aws">AWS</label>
		<input type="checkbox" name="tg" id="cnn" value="Convolutional Neural Networks">
		<label for="cnn">Convolutional Neural Networks</label>
		<input type="checkbox" name="tg" id="rnn" value="Recurrent Neural Networks">
		<label for="rnn">Recurrent Neural Networks</label>
		<input type="checkbox" name="tg" id="autoe" value="Autoencoders">
		<label for="autoe">Autoencoders</label>
		<input type="checkbox" name="tg" id="mt" value="Machine Translation">
		<label for="mt">Machine Translation</label>
		<input type="checkbox" name="tg" id="pyto" value="Pytorch">
		<label for="pyto">Pytorch</label>
		<input type="checkbox" name="tg" id="dm" value="Discrete Mathematics">
		<label for="dm">Discrete Mathematics</label>
		<input type="checkbox" name="tg" id="html" value="Html">
		<label for="html">Html</label>
		<input type="checkbox" name="tg" id="css" value="CSS">
		<label for="css">CSS</label>
		<input type="checkbox" name="tg" id="js" value="JavaScript">
		<label for="js">JavaScript</label>
		<input type="checkbox" name="tg" id="jquery" value="jQuery">
		<label for="jquery">jQuery</label>
		<input type="checkbox" name="tg" id="prol" value="Programming Languages">
		<label for="prol">Programming Languages</label>
		<input type="checkbox" name="tg" id="carch" value="Computer Architecture">
		<label for="carch">Computer Architecture</label>
		<input type="checkbox" name="tg" id="asmbl" value="Assembly Langauge">
		<label for="asmbl">Assembly Language</label>
		<input type="checkbox" name="tg" id="security" value="Security">
		<label for="security">Security</label>
		<input type="checkbox" name="tg" id="encryp" value="Encryption">
		<label for="encryp">Encryption</label>
		<input type="checkbox" name="tg" id="cg" value="Computer Graphics">
		<label for="cg">Computer Graphics</label>
		<input type="checkbox" name="tg" id="robo" value="Robotics">
		<label for="robo">Robotics</label>
		<br><input type="checkbox" name="tg" id="calc" value="Calculus">
		<label for="calc">Calculus</label>
		<!--  -->
		<!-- <input type="checkbox" name="tg" id="c" value="C">
		<label for="c">C</label> -->
		<input type="text" name="yr" minlength="1" maxlength="20" placeholder="Year" autocomplete="on">
		<input type="text" name="univ" minlength="1" maxlength="255" placeholder="Univ" autocomplete="on">
		<button type="submit">Push</button>
	</form>
	<script src="../utils/js/addnewcourses.js"></script>
	<!--close php conn !-->
	<?php $conn = null; ?>
</body>

</html>