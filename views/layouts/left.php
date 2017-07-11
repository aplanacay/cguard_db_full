<?php

use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php

            $type = 'success';
            $item = Yii::$app->session->get('curr_page');
            $type = '';
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'PCGRID Menu', 'options' => ['class' => 'header']],

                    /**
                    * 1
                    */
                    ['label' => 'Home', 'icon' => 'home', 'url' => Url::to(['/'])],

                    /**
                    * 2
                    */
                    ['label' => 'Cereals', 'icon' => 'toggle-down', 'items' => 
                        [
                            /**
                            * 2.1
                            */
                            ['label' => 'Corn', 'icon' => 'toggle-down', 'items' => 
                                [
                                    /**
                                    * 2.1.1
                                    */
                                    ['label' => 'Registration Data', 'icon' => 'book', 'items' => 
                                        [
                                            ['label' => 'New Registration Entry', 'icon' => 'plus', 'url' => Url::to(['/corn/browse/add']), 'active' => ($item == 'corn-add')
                                            ],
                                            ['label' => 'Tabular view', 'icon' => 'table', 'url' => Url::to(['/corn/browse/registration']), 'active' => ($item == 'corn-registration' )
                                            ],
                                        ]
                                    ],
                                    /**
                                    * 2.1.2
                                    */
                                    ['label' => 'Passport Data', 'icon' => 'leaf', 'items' =>[
                                            ['label' => 'New Passport Entry', 'icon' => 'plus', 'url' => Url::to(['/corn/browse/create']), 'active' => ($item == 'corn-create')
                                            ],
                                            ['label' => 'Tabular view', 'icon' => 'table', 'url' => Url::to(['/corn/browse/index']), 'active' => ($item == 'corn-browse')
                                            ],
                                            ['label' => 'Grid view', 'icon' => 'table', 'url' => Url::to(['/corn/view/index']), 'active' => ($item == 'corn-view')
                                            ],
                                            ['label' => 'Search', 'icon' => 'search', 'url' => Url::to(['/corn/browse/search']), 'active' => ($item == 'corn-search')
                                            ],
                                            ['label' => 'Import File', 'icon' => 'upload', 'url' => Url::to(['/corn/upload/index']), 'active' => ($item == 'corn-import')
                                            ],
                                        ]
                                    ],
                                    /**
                                    * 2.1.3
                                    */
                                    ['label' => 'Characterization Data', 'icon' => 'list', 'items' => 
                                        [
                                            ['label' => 'Tabular view', 'icon' => 'table', 'url' => Url::to(['/corn/characterization/index']), 'active' => ($item === 'corn-characterization-browse' )
                                            ],
                                            ['label' => 'Grid view', 'icon' => 'table', 'url' => Url::to(['/corn/characterization/tabs']), 'active' => ( $item === 'corn-characterization-tabs')
                                            ],
                                            ['label' => 'Search', 'icon' => 'search', 'url' => Url::to(['/corn/characterization/search']), 'active' => ($item === 'corn-characterization-search')
                                            ],
                                            ['label' => 'Import File', 'icon' => 'upload', 'url' => Url::to(['/corn/characterization/upload']), 'active' => ($item == 'corn-characterization-import')
                                            ],     
                                        ] 
                                    ],    
                                    /**
                                    * 2.1.4
                                    */     
                                    ['label' => 'Evaluation', 'icon' => 'check', 'items' => 
                                        [
                                            ['label' => 'Tabular view', 'icon' => 'table', 'url' => Url::to(['/corn/browse/evaluation-browse']), 'active' => ($item === 'corn-evaluation-browse' )
                                            ],
                                            ['label' => 'Grid view', 'icon' => 'table', 'url' => Url::to(['/corn/view/evaluation']), 'active' => ($item === 'corn-evaluation' )
                                            ],
                                            ['label' => 'Search', 'icon' => 'search', 'url' => Url::to(['/corn/browse/evaluation-search']), 'active' => ($item === 'corn-evaluation-search')
                                            ],
                                            ['label' => 'Import File', 'icon' => 'upload', 'url' => Url::to(['/corn/characterization/upload']), 'active' => ($item == 'corn-characterization-import')
                                            ],
                                        ]
                                    ],
                                    /**
                                    * 2.1.5
                                    */
                                    ['label' => 'Inventory', 'icon' => 'folder-open', 'items' => 
                                        [
                                            ['label' => 'List', 'icon' => 'list', 'url' => Url::to(['/inventory/inventory/index']), 'active' => ($item == 'inventory-index')
                                            ],
                                        ]
                                    ],
                                ],
                            ],
                        ],
                    ],

                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
