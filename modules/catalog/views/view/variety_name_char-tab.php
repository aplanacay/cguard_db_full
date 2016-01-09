<div class="variety_name_char-div-id">
    <h1></h1>
    <?php

    use kartik\tabs\TabsX;

$content1 = '';
    $content2 = 'b';
    $content3 = 'c';
    $content4 = 'd';

    use \kartik\detail\DetailView;

$bordered = false;
    $striped = true;
    $condensed = true;
    $responsive = true;
    $hover = true;
    $hAlign = true;
    $vAlign = false;
    $fadeDelay = true;
    $contentA = \kartik\detail\DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'crop_id',
                    // 'cultivar/variety_name/pedigree',
                    ['attribute' => 'scientific_name', 'type' => DetailView::INPUT_TEXT],
                ],
                'mode' => 'view',
                'bordered' => $bordered,
                'striped' => $striped,
                'condensed' => $condensed,
                'responsive' => $responsive,
                'hover' => $hover,
                'hAlign' => $hAlign,
                'vAlign' => $vAlign,
                'fadeDelay' => $fadeDelay,
                'enableEditMode' => false,
                'panel' => [
                    'heading' => 'Crop Collected',
                    'type' => 'panel panel-success',
                ],
//        'deleteOptions' => [ // your ajax delete parameters
//            'params' => ['id' => 1000, 'kvdelete' => true],
//        ],
                'container' => ['id' => 'kv-demo'],
//        'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])] // your action to delete
    ]);
    ?>
</div>
