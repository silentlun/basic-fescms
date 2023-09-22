<?php
/**
 * GridView.php
 * @author: allen
 * @date  2020年6月11日上午10:06:31
 * @copyright  Copyright igkcms
 */
namespace backend\components\grid;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\widgets\bootstrap5\LinkPager;

class GridView extends \yii\grid\GridView
{
    public $dataColumnClass = 'backend\components\grid\DataColumn';
    public $options = ['class' => 'table-responsive-md'];
    
    public $tableOptions = ['class' => 'table table-hover'];
    
    public $layout = "{items}\n<div class='d-flex flex-wrap justify-content-between align-items-center'><div class='col-lg mb-3'>{summary}</div><div class='col-lg d-flex justify-content-end'>{pager}</div></div>";
    
    public $pager = [
        'firstPageLabel' => '首页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
        'lastPageLabel' => '尾页'
    ];
    
    public $emptyText = '暂时没有任何数据！';
    public $emptyTextOptions = ['style' => 'color:red;font-weight:bold'];
    
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        parent::run();
    }
    
    /**
     * Renders the table header.
     * @return string the rendering result.
     */
    public function renderTableHeader()
    {
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderHeaderCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
        if ($this->filterPosition === self::FILTER_POS_HEADER) {
            $content = $this->renderFilters() . $content;
        } elseif ($this->filterPosition === self::FILTER_POS_BODY) {
            $content .= $this->renderFilters();
        }
        
        return "<thead class='table-light'>\n" . $content . "\n</thead>";
    }
    
    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        
        return $class::widget($pager);
    }
}