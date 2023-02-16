<?php
use yii\helpers\Url;

/** @var yii\web\View $this */


$this->title = 'My Yii Application';
?>
<div class="site-index">

<link rel="stylesheet" href="web/css/site.css">

    <div class="jumbotron text-center bg-transparent">
        <h2 class="display-6">Добро пожаловать!</h2>

        <p class="lead">На данном сайте Вы можете оставить заявку, которую мы обязательно рассмотрим и решим.</p>

        <p id="counter">*Обновляем счётчик решённых проблем*</p>

        <input class="btn btn-md mb-3 px-3 py-2 text-light bg-dark" type="button" value="Разрешить звуковые уведомления">
    </div>

    <div class="body-content">

        <div class="row">

        <?php
        foreach($problems as $problem){
            echo '
            <div class="col-lg-5 mb-3 mx-auto">
                <h3 class="my-2 text-dark fw-semibold">'.$problem->name_problem.'</h3>
                <div style="max-width:440px; min-width:310px; max-height:300px; min-height:200px; overflow:hidden">
                <img alt="Проблемы" class="w-100 scale" src="web/uploads/'.$problem->photoAfter.'" 
                data-before="web/uploads/'.$problem->photoBefore.'"
                data-after="web/uploads/'.$problem->photoAfter.'"
                onMouseOver="hover(this)" onMouseOut="back(this)">
                </div>

                <div class="overflow-auto my-2 p-1" style="max-height:200px; min-width:310px; max-width:390px">
                <p class="text-dark">'.$problem->description_problem.'</p>
                </div>
                <p class="fw-semibold">'.$problem->date.'</p>
                
            </div>';
        }
        ?>
            
        </div>

    </div>
</div>
<script>
    var i = 0;
    function hover (element) {
        element.src=element.dataset.before;
    }
    function back (element) {
        element.src=element.dataset.after;
    }


    function updateCounter(){
        $.ajax({
            type: 'GET',
            url: '<?= Url::toRoute('/site/counter') ?>',
            dataType: 'text',

            success: function (response){
                if(i != response){
                    //Звуковое уведомление
                    var a = new Audio('web/audi.mp3');
                    a.play();
                    i = response;
                }
                $('#counter').html('Решено заявок: ' + response);
            }
            });
        }
        
        setInterval(updateCounter, 3000);

</script>