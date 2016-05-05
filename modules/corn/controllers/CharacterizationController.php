<?php

namespace app\modules\corn\controllers;

use Yii;
use app\models\CharacterizationBase;
use app\modules\corn\models\CharacterizationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\data\ActiveDataProvider;

/**
 * CharacterizationController implements the CRUD actions for CharacterizationBase model.
 */
class CharacterizationController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CharacterizationBase models.
     * @return mixed
     */
    public function actionSearch() {
        \Yii::$app->session->set('curr_page', 'corn-characterization-search');
        $searchModel = new CharacterizationSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('_search', [
                    'model' => $searchModel,
                        //'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTabs($id = null) {
        \Yii::$app->session->set('curr_page', 'corn-characterization-tabs');
        \ChromePhp::log(Yii::$app->request->get());
        $data = Yii::$app->request->get('CharacterizationSearch');
        $search = false;
        if (isset($data)) {
            foreach ($data as $key => $val) {
                if (!empty($val)) {
                    $search = true;
                    break;
                }
            }
        }

        if (!$search) {
            if (!isset($id)) {
                \ChromePhp::log('here');
                $query = CharacterizationBase::find();
                $model = CharacterizationBase::find()->where(['is_void' => false])->orderBy('id')->one();
            } else {
                $query = CharacterizationBase::find()->where(['id' => $id, 'is_void' => false]);
                $model = CharacterizationBase::find()->where(['id' => $id, 'is_void' => false])->orderBy('id')->one();
            }
            $countQuery = clone $query;
            $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 1]);
            \ChromePhp::log($pages);
            $model = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->one();

            // $searchModel = new CharacterizationSearch();
            $dataProvider = new ActiveDataProvider([
                'query' => $model,
                //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
                'pagination' => $pages,
            ]);
            return $this->render('tabs', [
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                        'dataProvider' => $dataProvider,
                            // 'id' => $id
                            //  'columns' => $this->prepareDataProvider($columns),
            ]);
        } else if ($search) {
            $searchModel = new CharacterizationSearch();

            $query = $searchModel->search(Yii::$app->request->get());
            $model = $query->one();
            $countQuery = clone $query;

            $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 1]);

            $model = $query->offset($pages->offset)
                    ->limit($pages->limit)
                    ->one();

            // $searchModel = new CharacterizationSearch();
            $dataProvider = new ActiveDataProvider([
                'query' => $model,
                //'pagination' => array('totalCount' => $query->count(),'pageSize' => 1,),
                'pagination' => $pages,
            ]);
            \ChromePhp::log($pages);
            return $this->render('tabs', [
                        // 'searchModel' => $searchModel,
                        'model' => $model,
                        'dataProvider' => $dataProvider,
                            //  'gridColumns' => getGridColumns(),
                            // 'id' => $id
                            //  'columns' => $this->prepareDataProvider($columns),
            ]);
        }
    }

    /**
     * Lists all CharacterizationBase models.
     * @return mixed
     */
    public function actionIndex() {
        \Yii::$app->session->set('curr_page', 'corn-characterization-browse');
        $searchModel = new CharacterizationSearch();
        $query = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CharacterizationBase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CharacterizationBase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CharacterizationBase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CharacterizationBase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CharacterizationBase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CharacterizationBase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CharacterizationBase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CharacterizationBase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function getGridColumns() {
        return [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                //'attribute'=>'',
                'label' => 'PHL NO.',
                'value' => function ($model) {
            return $model->gemplasm->phl_no;
        }
            ],
            [
                //'attribute'=>'',
                'label' => 'OLD ACC_NO',
                'value' => function ($model) {
            return $model->gemplasm->old_acc_no;
        }
            ],
            [
                //'attribute'=>'',
                'label' => 'GB NO.',
                'value' => function ($model) {
            return $model->gemplasm->gb_no;
        }
            ],
//    'id',
//'germplasm_id',
            'days_to_emergence',
            'days_to_tasseling',
            'days_to_slking',
            'days_to_harvest',
            'tillering_index',
            'total_number_of_leaves_per_plant',
            'leaf_length',
            'leaf_width',
            'venation_index',
            'days_to_ear_leaf_inflorescence',
            'stalk_lodging',
            'grain_shedding',
            'unshelled_weight',
            'shelled_weight',
            'kernel_weight',
            'shellpc',
            'stem_color',
            'sheath_pubescence',
            'leaf_orientation',
            'presence_of_leaf_ligule',
            'tassel_type',
            'silk_color',
            'tassel_color',
            'plant_height',
            'ear_height',
            'foliage',
            'number_of_leaves_above_upper_ear',
            'number_of_leaves_below_upper_ear',
            'number_of_internodes_below_uppermost_ear',
            'number_of_internodes_on_the_whole_stem',
            'stem_diameter_at_the_base',
            'stem_diameter_below_uppermost_ear',
            'tassel_length',
            'tassel_peduncle_length',
            'tassel_branching_space',
            'number_of_primary_branches_on_tassel',
            'number_of_secondary_branches_on_tassel',
            'number_of_tertiary_branches_on_tassel',
            'stay_green',
            'husk_cover',
            'husk_fitting',
            'husk_tip_shape',
            'ear_shape',
            'ear_tip_shape',
            'ear_orientation',
            'ear_length',
            'ear_diameter',
            'cob_diameter',
            'rachs_diameter',
            'peduncle_length',
            'number_of_bracts',
            'kernel_row_arrangement',
            'number_of_kernel_rows',
            'number_of_kernels__per_row',
            'cob_color',
            'kernel_type',
            'kernel_color',
            'kernel_length',
            'kernel_width',
            'kernel_thickness',
            'shape_of_upper_kernel_surface',
            'pericarp_color',
            'aleurone_color',
            'endosperm_color',
        ];
    }

}
