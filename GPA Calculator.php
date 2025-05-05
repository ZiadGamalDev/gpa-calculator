<!DOCTYPE html>
<html>
<head>
	<title>GPA Calculator</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<?php
    function calculateGPA($credit_hours, $grades)
    {
        $sum1 = 0;
        $sum2 = array_sum($credit_hours);
        foreach ($credit_hours as $index => $credit) {
            $grade = $grades[$index];
            $sum1 += $credit * $grade;
        }
        return $sum1 / $sum2;
    }
    $i = 1;
?>

<body>
	<div class="container">
		<h2>GPA Calculator</h2>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$subjects = $_POST["subjects"]; ?>
            <form method="post">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Credit Hours</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($c = 1; $c <= $subjects; $c++) { ?>
                                    <tr>
                                        <td>
                                            <input type='text' class='form-control' name='subject_name[]' value="subject <?= $i++ ?>">
                                        </td>
                                        <td>
                                            <input type='number' class='form-control' name='credit[]' value='3' required>
                                        </td>
                                        <td>
                                            <select class='form-control' name='grade[]' required>
                                                <option value='' disabled selected>Select Grade</option>
                                                <option value='4'>+ممتاز (A+)</option>
                                                <option value='3.6'>ممتاز (A)</option>
                                                <option value='3.3'>+جيد جدا (B+)</option>
                                                <option value='3'>جيد جدا (B)</option>
                                                <option value='2.6'>+جيد (C+)</option>
                                                <option value='2.4'>جيد (C)</option>
                                                <option value='2.2'>+مقبول (D+)</option>
                                                <option value='2'>مقبول (D)</option>
                                                <option value='0'>راسب (F)</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" name="calculate">Calculate GPA</button>
                </div>
                <input type='hidden' name='subjects' value='<?= $subjects ?>'>
            </form>
		<?php } else { ?>
            <form method="post">
                <div class="form-group">
                    <label for="subjects">Number of subjects:</label>
                    <input type="number" class="form-control" name="subjects" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
		<?php } ?>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculate"])) { ?>
            <div class='mt-4'>GPA = <strong><?= calculateGPA($_POST["credit"], $_POST["grade"]) ?></strong></div>
		<?php } ?>
	</div>
</body>
</html>

<!--
A+  4
A   3.6
B+  3.3
B   3
C+  2.6
C   2.4
D+  2.2
D   2
F   0
-->