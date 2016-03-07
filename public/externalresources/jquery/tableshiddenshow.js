
// i put this code in company.blade.php
		function Fist_Do_Company()
		{	

			$('#IndustryID').prop('checked', true);
			$('#datatables td:nth-child(2),th:nth-child(2)').show();
			
			$('#CompanyNameID').prop('checked', true);
			$('#datatables td:nth-child(3),th:nth-child(3)').show();

			$('#PICNameID').prop('checked', true);
			$('#datatables td:nth-child(7),th:nth-child(7)').show();

			$('#PICPositionID').prop('checked', true);
			$('#datatables td:nth-child(8),th:nth-child(8)').show();

			$('#PICEmailID').prop('checked', true);
			$('#datatables td:nth-child(13),th:nth-child(13)').show();
		}


// i put this code in company.blade.php
		function Data_Company()
		{

			$('#IndustryID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(2),th:nth-child(2)').show();
			    }else{
			        $('#datatables td:nth-child(2),th:nth-child(2)').hide();    
			    }
			});

			$('#CompanyNameID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(3),th:nth-child(3)').show();
			    }else{
			        $('#datatables td:nth-child(3),th:nth-child(3)').hide();    
			    }
			});

			$('#CompanyAddressID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(4),th:nth-child(4)').show();
			    }else{
			        $('#datatables td:nth-child(4),th:nth-child(4)').hide();    
			    }
			});

			$('#CompanyWebsiteID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(5),th:nth-child(5)').show();
			    }else{
			        $('#datatables td:nth-child(5),th:nth-child(5)').hide();    
			    }
			});

			$('#CompanyPhoneNumberID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(6),th:nth-child(6)').show();
			    }else{
			        $('#datatables td:nth-child(6),th:nth-child(6)').hide();    
			    }
			});

			$('#PICNameID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(7),th:nth-child(7)').show();
			    }else{
			        $('#datatables td:nth-child(7),th:nth-child(7)').hide();    
			    }
			});

			$('#PICPositionID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(8),th:nth-child(8)').show();
			    }else{
			        $('#datatables td:nth-child(8),th:nth-child(8)').hide();    
			    }
			});

			$('#PICOfficeAddressID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(9),th:nth-child(9)').show();
			    }else{
			        $('#datatables td:nth-child(9),th:nth-child(9)').hide();    
			    }
			});

			$('#PICOfficeNumberID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(10),th:nth-child(10)').show();
			    }else{
			        $('#datatables td:nth-child(10),th:nth-child(10)').hide();    
			    }
			});

			$('#PICHPID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(11),th:nth-child(11)').show();
			    }else{
			        $('#datatables td:nth-child(11),th:nth-child(11)').hide();    
			    }
			});

			$('#PICFaxID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(12),th:nth-child(12)').show();
			    }else{
			        $('#datatables td:nth-child(12),th:nth-child(12)').hide();    
			    }
			});

			$('#PICEmailID').click(function(event) {  //on click 
			    if(this.checked) { // check select status
			        $('#datatables td:nth-child(13),th:nth-child(13)').show();
			    }else{
			        $('#datatables td:nth-child(13),th:nth-child(13)').hide();    
			    }
			});

		    
		}
//extra for table jquery 
function Table_Resize()
{
	$("#datatables").resizableColumns({
    	store: window.store
  	});
}
