<?php 
$this->headTitle();
?>

<div class="index-container">
	<div class="left">
		<h1><?php echo SEARCH_TITLE; ?></h1>
		<div class="search_form">
			<div class="main">
				<div class="title"><?php echo SEARCH_MARC; ?></div>
				<div class="string"><input type="text" name="string" id="string"></div>
				<div class="button"><input id="button" type="button" value="<?php echo SEARCH_BUTTON; ?>" onclick="search($('#string').val());"></div>
				<div class="clear"></div>
			</div>
			<div class="extend" id="extend">
				<div class="title"><?php echo SEARCH_SETTINGS; ?></div>
				<div class="cat">
					<span class="title"><?php echo SEARCH_MATERIAL; ?></span>
					<select name="cat" id="cat" onchange="search($('#string').val(), $('#cat').val()); setSubCat($('#cat').val());">
						
					</select>
					<div class="clear"></div>
				</div>
				<div class="sub-cat">
					<span class="title"><?php echo SEARCH_TARGET; ?></span>
					<select name="sub-cat" id="sub-cat" onchange="search($('#string').val(), $('#cat').val(), $('#sub-cat').val());">
						
					</select>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
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
var brands = ["<?php echo implode('", "', $this->autocomplete); ?>"];
$('#extend').hide();
setCat();

$(function() {
    var availableTags = brands;
    $( "#string" ).autocomplete({
        source: availableTags
    });
});

function search(marc, cat, subcat) 
{
	$('#search_result').empty();
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

	console.log(marc);
	console.log(cat);
	console.log(subcat);
	$inCat = selectInCat(marc, cat);
	$inSubcat = selectInSubcat(marc, cat, subcat);
}

function selectInCat(marc, cat)
{
	for (var c = 0; c < tree.length; c++) {
		//console.log(tree[c]['childs'].length);
		//console.log('goods-count: ' + tree[c]['goods'].length);
		var goodsCount = tree[c]['goods'].length;
		var goods = tree[c]['goods'];
		if (goodsCount > 0 && (cat == 0 || tree[c]['id'] == cat)) {
			for (var g = 0; g < goodsCount; g++) {
				var brandsCount = goods[g]['other_brands'].length;
				//console.log('good-brands-count: ' + brandsCount);
				
				if (brandsCount > 0) {
					for (var b = 0; b < brandsCount; b++) {
						if (strstr(goods[g]['other_brands'][b].toLowerCase(), marc.toLowerCase())) {
							insertResult(goods[g]['title'], goods[g]['file']);
						}
					}
				}
			}
		}
	}
}

function selectInSubcat(marc, cat, subcat)
{
	for (var c = 0; c < tree.length; c++) {
		//console.log('subcats in ' + tree[c]['title'] + ' there are ' + tree[c]['childs'].length);
		if (tree[c]['childs'].length > 0) {
			var childs = tree[c]['childs'];
			for (var s = 0; s < childs.length; s++) {
				var goods = childs[s]['goods'];
				//console.log('goods count in  in ' + childs[s]['title'] + ' there are ' + goods.length);
				if (goods.length > 0 && (cat == 0 || tree[c]['id'] == cat) && (subcat == 0 || childs[s]['id'] == subcat)) {
					for (var g = 0; g < goods.length > 0; g++) {
						var brandsCount = goods[g]['other_brands'].length;
						//console.log('good-brands-count: ' + brandsCount);
						
						if (brandsCount > 0) {
							for (var b = 0; b < brandsCount; b++) {
								if (strstr(goods[g]['other_brands'][b].toLowerCase(), marc.toLowerCase())) {
									insertResult(goods[g]['title'], goods[g]['file']);
								}
							}
						}
					}
				}
			}
		}
	}
}

function insertResult(title, url)
{
	if (url == 'none') {
		$('#search_result').append('<div>' + title + '</div>');
	} else {
		$('#search_result').append('<a href ="' + url + '" class="resultItem">' + title + '</a>');
	}
}

function setCat()
{
	$('#cat').append('<option value="0"><?php echo SEARCH_SELECT_MATERIAL; ?></option>');
	for (var c = 0; c < tree.length; c++) { 
		$('#cat').append('<option value="' + tree[c]['id'] + '">' + tree[c]['title'] + '</option>');
	}
}

function setSubCat(cat)
{
	$('#sub-cat').empty();
	$('#sub-cat').append('<option value="0"><?php echo SEARCH_SELECT_TARGET; ?></option>');
	for (var c = 0; c < tree.length; c++) {
		var childs = tree[c]['childs'];
		if(tree[c]['id'] == cat && childs.length > 0) {
			for (var s = 0; s < childs.length; s++) {
				$('#sub-cat').append('<option value="' + childs[s]['id'] + '">' + childs[s]['title'] + '</option>');
			}
		}
	}
}

function strstr(haystack, needle, bool) {
    // Finds first occurrence of a string within another
    //
    // version: 1103.1210
    // discuss at: http://phpjs.org/functions/strstr    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: strstr(‘Kevin van Zonneveld’, ‘van’);
    // *     returns 1: ‘van Zonneveld’    // *     example 2: strstr(‘Kevin van Zonneveld’, ‘van’, true);
    // *     returns 2: ‘Kevin ‘
    // *     example 3: strstr(‘name@example.com’, ‘@’);
    // *     returns 3: ‘@example.com’
    // *     example 4: strstr(‘name@example.com’, ‘@’, true);    // *     returns 4: ‘name’
    var pos = 0;

    haystack += "";
    pos = haystack.indexOf(needle); 
    if (pos == -1) {
        return false;
    } else {
        if (bool) {
            return haystack.substr(0, pos);
        } else {
            return haystack.slice(pos);
        }
    }
}

</script>