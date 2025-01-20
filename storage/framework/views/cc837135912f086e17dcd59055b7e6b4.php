<!DOCTYPE html>
<html>
<head>
    <title>Income Summary Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Income Summary Report</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $totalIncome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($income->date); ?></td>
                    <td><?php echo e(number_format($income->total, 2)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH G:\Projects\freind projects\Nifty-look\resources\views/pdf/income-summary.blade.php ENDPATH**/ ?>