<?php
 App::uses("SchemaSuite","SchemaSuite");
echo "<?php\n";
?>
App::uses("AppTestFixture","TestSuite");
App::uses("SchemaSuite","SchemaSuite");

/**
 * <?php echo $model; ?> Fixture
 */
class <?php echo $model; ?>Fixture extends AppTestFixture {
<?php if ($table): ?>
  protected $scheme = "users";
<?php else:
  $table = Inflector::tableize($model);
?>
  protected $scheme = "<?php echo $table;?>";
<?php endif; ?>
  public function init(){
<?php if (SchemaSuite::existDefault($table)):?>
    foreach(SchemaSuite::getDefault($this->scheme) as $default){
      $this->generate($default);
    }
<?php else:?>
    $this->generate(array(

    ));
<?php endif;?>
    parent::init();
  }
}
