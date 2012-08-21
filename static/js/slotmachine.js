var columnReadyCounter = 0;

// This is the callback function for the "hiding" animations
// it gets called for each animation (since we don't know which is slowest)
// the third time it's called, then it resets the column positions
function ifReadyThenReset() {
	
	columnReadyCounter++;
	
	if (columnReadyCounter == 3) {
		$(".col").not(".current .col").css("top", 350);
		columnReadyCounter = 0;
	}

};

// When the DOM is ready
$(function() {
	
	var $allContentBoxes = $(".content-box"),
	    $allTabs = $(".tabs li a"),
	    $el, $colOne, $colTwo, $colThree, $colFour, $colFive, $colSix, $colSeven,
	    hrefSelector = "",
	    speedOne = 1000,
		speedTwo = 2000,
		speedThree = 1500;
		speedFour = 1000;
		speedFive = 2000;
		speedSix = 1500;
		speedSeven = 1500;
	
	// first tab and first content box are default current
	$(".tabs li:first-child a, .content-box:first");
	$(".box-wrapper .current .col").css("top", 0);
	
	$("#slot-machine-tabs").delegate(".tabs a", "click", function() {
		
		$el = $(this);
		
		if ( (!$el.hasClass("current")) && ($(":animated").length == 0 ) ) {
		
			// current tab correctly set
			$allTabs.removeClass("current");
			$el.addClass("current");
			
			// optional... random speeds each time.
			speedOne = Math.floor(Math.random()*1000) + 500;
			speedTwo = Math.floor(Math.random()*1000) + 500;
			speedThree = Math.floor(Math.random()*1000) + 500;
		    speedFour = Math.floor(Math.random()*1000) + 500;
			speedFive = Math.floor(Math.random()*1000) + 500; 
			speedSix = Math.floor(Math.random()*1000) + 500; 
			speedSeven = Math.floor(Math.random()*1000) + 500; 
			// each column is animated upwards to hide
			// kind of annoyingly redudundant code
			/*$colOne = $(".box-wrapper .current .col-one");
			$colOne.animate({
				"top": -$colOne.height()
			}, speedOne);
		
			$colTwo = $(".box-wrapper .current .col-two");
			$colTwo.animate({
				"top": -$colTwo.height()
			}, speedTwo);
		
			$colThree = $(".box-wrapper .current .col-three");
			$colThree.animate({
				"top": -$colThree.height()
			}, speedThree);
			
			$colFour = $(".box-wrapper .current .col-four");
			$colFour.animate({
				"top": -$colFour.height()
			}, speedFour);
			
			$colFive = $(".box-wrapper .current .col-five");
			$colFive.animate({
				"top": -$colFive.height()
			}, speedFive);
			
			$colSix = $(".box-wrapper .current .col-six");
			$colSix.animate({
				"top": -$colSix.height()
			}, speedSix);
			
			$colSeven = $(".box-wrapper .current .col-seven");
			$colSeven.animate({
				"top": -$colSeven.height()
			}, speedSeven);
			*/
			// new content box is marked as current
			$allContentBoxes.removeClass("current");		
			hrefSelector = $el.attr("href");
			$(hrefSelector).addClass("current");
		
			// columns from new content area are moved up from the bottom
			// also annoying redundant and triple callback seems weird
			$(".box-wrapper .current .col-one").animate({
				"top": 0
			}, speedOne, function() {
				ifReadyThenReset();
			});
	
			$(".box-wrapper .current .col-two").animate({
				"top": 0
			}, speedTwo, function() {
				ifReadyThenReset();
			});
		
			$(".box-wrapper .current .col-three").animate({
				"top": 0
			}, speedThree, function() {
				ifReadyThenReset();
			});
			
			$(".box-wrapper .current .col-four").animate({
				"top": 0
			}, speedFour, function() {
				ifReadyThenReset();
			});
			
			$(".box-wrapper .current .col-five").animate({
				"top": 0
			}, speedFive, function() {
				ifReadyThenReset();
			});
			$(".box-wrapper .current .col-six").animate({
				"top": 0
			}, speedSix, function() {
				ifReadyThenReset();
			});
		    $(".box-wrapper .current .col-seven").animate({
				"top": 0
			}, speedSeven, function() {
				ifReadyThenReset();
			});
		
		};

	});

});