for (let button of document.getElementsByClassName('btn-show-alert'))

{
  button.addEventListener("click", function( e ){ //e => event
  	if( ! confirm("Etes-vous sûr?") ){
            e.preventDefault(); // ! => don't want to do this
        } 
    });
}