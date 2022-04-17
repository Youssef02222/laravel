// $(document).ready(function(){
//     $('#alertbox').addEventListener('click', function(){
//         console.log("sadaslkdjaskldjkas");
//       
// });


document.getElementById('alertbox').addEventListener('click', ()=> {
    console.log("button clicked!!");
    // document.getElementById("error").html("You Clicked on Click here Button");
    document.getElementById('myModal').modal("show");
});