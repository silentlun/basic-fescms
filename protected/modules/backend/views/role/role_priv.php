<?php

use yii\helpers\Html;
use backend\widgets\ActiveForm;
use app\widgets\JsBlock;


/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(
    '@web/static/plugins/jquery-treeview/js/jquery.treetable.js',
    ['depends' => [\yii\web\YiiAsset::className()]]
    );
?>
<style>.ajaxmodal-content{height:400px;overflow-y: auto;}</style>
<div class="modal-header">
<h4 class="modal-title" id="ajaxModalLabel">设置[<?=$name?>]权限</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
  </div>
  <?php $form = ActiveForm::begin(); ?>
  <div class="modal-body ajaxmodal-content">
    <table class="table treeTable" id="dnd-example">
          <thead>
            <tr>
              <th>权限列表</th>
            </tr>
          </thead>
          <tbody>
            <?=$menus?>
          </tbody>
        </table>
    
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
    <button type="submit" class="btn btn-primary">保存</button>
  </div>
  <?php ActiveForm::end(); ?>

<?php JsBlock::begin()?>
    <script>
    $(document).ready(function() {
        $("#dnd-example").treeTable({indent: 20});
    });
    function checknode(obj)
    {
        var chk = $("input[type='checkbox']");
        var count = chk.length;
        var num = chk.index(obj);
        var level_top = level_bottom =  chk.eq(num).attr('level')
        for (var i=num; i>=0; i--)
        {
                var le = chk.eq(i).attr('level');
                if(eval(le) < eval(level_top)) 
                {
                    chk.eq(i).prop("checked",true);
                    var level_top = level_top-1;
                }
        }
        for (var j=num+1; j<count; j++)
        {
                var le = chk.eq(j).attr('level');
                if(chk.eq(num).prop("checked")) {
                    if(eval(le) > eval(level_bottom)) chk.eq(j).prop("checked",true);
                    else if(eval(le) == eval(level_bottom)) break;
                }
                else {
                    if(eval(le) > eval(level_bottom)) chk.eq(j).prop("checked",false);
                    else if(eval(le) == eval(level_bottom)) break;
                }
        }
    }
    </script>
<?php JsBlock::end()?>
