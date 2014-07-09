<?php
$MAXENTRIES = 10;
$is_submitted = count($_POST) > 0;
if ($is_submitted) {
	$mails = $_POST["inputs"];
	sort($mails);
}
?>
<html>
	<head>
		<title>Testformular</title>
		<style>
			.winner {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<form accept-charset="utf-8" action="mail.php" method="POST">
		<?php
			for ($i = 0; $i < $MAXENTRIES; $i++) {
				echo "<label>eMail:</label>";
				echo "<input type='email' name='inputs[]' /><br />";
			}
		?>
		<button type="submit">Send</button>
		</form>

		<ul>
		<?php
			if ($is_submitted) {
				$random_number = rand(0, $MAXENTRIES - 1);			
				for ($i = 0; $i < count($mails); $i++) {
					if ($mails[$i] != "") {
						$mail = htmlspecialchars($mails[$i]);
						if ($i == $random_number) {
							echo "<li class='winner'>" . $mail . "</li>";
						}
						else {
							echo "<li>" . $mail . "</li>";
						}
					}
				}
			}
		?>
		</ul>
	</body>
</html>
