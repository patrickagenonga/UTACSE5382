function openEditGrade($this){
	var editGrade = document.getElementById('edit-grade');
	var studid = document.getElementById('sid');
	var studname = document.getElementById('name');
	var studgrade = document.getElementById('grade');
	studid.value = $($this).closest('tr').find('td:first').text();
	studname.value = $($this).closest('tr').find('td:nth-child(2)').text();
	studgrade.value = $($this).closest('tr').find('td:nth-child(3)').text();
	editGrade.style.display = "block";
}
function changeGrade(event){
	editGrade.style.display = "none";
} 
function closeEditGrade(){
	var editGrade = document.getElementById('edit-grade')
	editGrade.style.display = "none";
}
window.onclick = function(event){
	var editGrade = document.getElementById('edit-grade');
	if(event.target == editGrade){
		editGrade.style.display = "none";	
	}
}