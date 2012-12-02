<?php 
$this->headTitle();
?>

<div class="index-container">
	<div class="left">
		<h1>Поиск</h1>
		<div class="search_form">
			<div class="main">
				<div class="title">Введите марку</div>
				<div class="string"><input type="text" name="string" id="string"></div>
				<div class="button"><input type="button" value="Поиск" onclick="search($('#string').val());"></div>
			</div>
			<div class="extend" id="extend">
				<div class="title">Настройки поиска</div>
				<div class="cat">
					<select name="cat" id="cat">
						
					</select>
				</div>
				<div class="sub-cat" id="sub-cat">
					<select name="cat" id="cat">
						
					</select>
				</div>
			</div>
		</div>	
		<div class="search_result" id="search_result">
		
		</div>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('download-book', 'index', 'default', array('book' => 'info-book')); ?>
		</div>
	</div>
	<div class="clear"></div>
</div>

<script>
var tree = <?php echo $this->tree;?>;
//$('#extend').hide();

function search(marc, cat, subcat) 
{
	$('#extend').show();
	if (!marc) {
		var marc = 0;
	}
	if (!cat) {
		var cat = 0;
	}
	if (!subcat) {
		var subcat = 0;
	}

	//alert(marc);
	$inCat = selectInCat(marc);
}

function selectInCat(marc)
{
	for (var c = 0; c < tree.length; c++) {
		//console.log(tree[c]['childs'].length);
		//console.log('goods-count: ' + tree[c]['goods'].length);
		var goodsCount = tree[c]['goods'].length;
		var goods = tree[c]['goods'];
		if (goodsCount > 0) {
			for (var g = 0; g < goodsCount; g++) {
				var brandsCount = goods[g]['other_brands'].length;
				//console.log('good-brands-count: ' + brandsCount);
				
				if (brandsCount > 0) {
					for (var b = 0; b < brandsCount; b++) {
						if (marc == goods[g]['other_brands'][b]) {
							insertResult(goods[g]['title'], goods[g]['alias']);
						}
					}
				}
			}
		}
		
	}
}

function insertResult(title, alias)
{
	$('#search_result').append(title + '<br />');
}

function setCat(cat)
{
	
}

function setSubCat(cat)
{
	
}

</script>