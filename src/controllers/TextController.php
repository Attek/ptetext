<?php

namespace attek\text\controllers;

use attek\text\models\TextSearch;
use Yii;
use attek\text\models\Text;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TextController implements the CRUD actions for Text model.
 */
class TextController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Text models.
     * @return mixed
     */
    public function actionIndex()
    {

    	$searchModel = new TextSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Text model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAjaxView($id)
    {
        return $this->renderAjax('_view', [
            'model' => $this->findModel($id),
        ]);
    }

	/**
	 * @return mixed|string
	 * @throws NotFoundHttpException
	 */
    public function actionAjax()
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $slug = isset($post['slug']) ? $post['slug'] : null;

            if ($slug != null) {
                $text = Text::find()->where('slug = :slug', [':slug' => $slug])->one();
                if ($text != null) {
                    return $text->text;
                } else {
                    throw new NotFoundHttpException('A keresett oldal nem található.');
                }

            } else {
                throw new NotFoundHttpException('A keresett oldal nem található.');
            }
        } else {
            throw new NotFoundHttpException('A keresett oldal nem található.');
        }
    }

    /**
     * Creates a new Text model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Text();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Text model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Text model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = Text::DELETED;
        $model->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Text model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Text the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Text::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A keresett oldal nem található.');
        }
    }

}