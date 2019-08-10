for (let button of document.getElementsByClassName('btn-show-alert'))

{
  button.addEventListener("click", function( e ){
  	if( ! confirm("Etes-vous sûr?") ){
            e.preventDefault();
        } 
    });
}