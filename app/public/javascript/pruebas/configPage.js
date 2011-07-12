$(document).ready(function(){
	
	//Sidebar Accordion Menu:
		
		$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);

    //Minimize Content Box
		
		$(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
		$(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().next().toggle(); // Toggle the Content Box
			  $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);

    // Content box tabs:
		$('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
		$('ul.content-box-tabs li a.default-tab').addClass('current'); // Add the class "current" to the default tab
		$('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"
		
		$('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
			function() { 
				$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
				$(this).addClass('current'); // Add class "current" to clicked tab
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);

    //Close button:
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);

    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Check all checkboxes when the one in a table head is checked:
		
		$('.check-all').click(
			function(){
				$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
			}
		);

    // Initialise Facebox Modal window:
		
		$('a[rel*=modal]').facebox(); // Applies modal window to any link with attribute rel="modal"

    // Initialise jQuery WYSIWYG:
		
		$(".wysiwyg").wysiwyg(); // Applies WYSIWYG editor to any textarea with the class "wysiwyg"
		
		$(function() {
			$(".Calendar").datepicker({
				defaultDate: new Date(),
				duration: 'normal',
				firstDay: 1,
				gotoCurrent: true,
				dateFormat: 'yy-mm-dd',
				showOn: "both",
				buttonImage: "vista/images/icons/small_calendar.png",
				buttonImageOnly: true,
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
				dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
				minDate: 0
			});
		});
     
	 $(function() {
			$(".Calendarall").datepicker({
				dateFormat: 'yy-mm-dd',						 
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado']
			});
		});
});

function newPopUp (dato,w,h){
	if(w == null || w == undefined || h == null || h == undefined ){
		w=420;
		h=630;
	}
	var left = (screen.width - w)/ 2;
	var top = (screen.height - h)/ 2;
	window.open(dato.href, dato.target, 'width='+w+',height='+h+', left='+left+', top='+top+', Scrollbars=yes, Resizable=no, Directories=no, Location =no, Menubar=no, Status=no, Toolbar=no');
}