<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event manager</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <?php $y = date('Y'); ?>
        
        <?php for($i = 1; $i <= 12; $i++): ?>  
        
        <?php $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $i, $y); ?>
        <?php $offset = date('N', strtotime("{$y}-{$i}-01")); ?>
        <?php $monthName = date('F', strtotime("{$y}-{$i}-01")); ?>
        <?php $daysName = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс']; ?>
        <?php $monthName = 
                [
                    'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 
                    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
                ];
        ?>
        
        <?php if(($i + 3) % 4 == 0): ?>
        <div class="row">
        <?php endif; ?>
        
        <div class="col-md-3">
            <table class="table table-bordered">
                
                <tr>
                <?php for($w = 0; $w < 7; $w++): ?>
                    <th><?php echo $daysName[$w]; ?></th>
                <?php endfor; ?>
                </tr>
                
            <tr>
            <caption><?php echo $monthName[$i - 1]; ?></caption>
            
            <?php --$offset; ?>
            
            <?php for($o = 0; $o < $offset; $o++): ?>
			<td></td>
		    <?php endfor; ?>
           
            <?php for($d = 1; $d <= $daysInMonth; $d++): ?>
                <td><?php echo $d ?></td>
                <?php if(($d + $offset) % 7 == 0): ?>            
                    </tr><tr>
                <?php endif; ?>
            <?php endfor; ?>
           
            <?php for($d = 0; ($d + $offset + $daysInMonth) % 7 != 0; $d++): ?>
			    <td></td>
		    <?php endfor; ?>
            </tr>
            </table>
        </div>
        
        <?php if($i%4 == 0): ?>
        </div>
        <?php endif; ?>
        
        <?php endfor; ?>
    </div>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>