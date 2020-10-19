/**
 * PROPIEDADES
 */
var brandSelector = {
    atSelector: document.querySelector("#category_name"),    
    molSelector: document.querySelector("#molTag")   
    
}

/**
 * METODOS
 */

 var methodsSelector = {

    beginform: function(){

        brandSelector.atSelector.addEventListener("change", methodsSelector.atOnchange);         
        brandSelector.molSelector.addEventListener("change", methodsSelector.molOnchange);         
        
    },

    atOnchange: function(selected){
        var selectedOption = selected.target.options[selected.target.selectedIndex].text;

        selectedOption == "Todas" ? brandSelector.molSelector.disabled = false : brandSelector.molSelector.disabled = true;
    },

    molOnchange: function(selected){
        var selectedOption = selected.target.options[selected.target.selectedIndex].text;
        
        selectedOption == "Todas" ? brandSelector.atSelector.disabled = false : brandSelector.atSelector.disabled = true;
    }
    

 }

 methodsSelector.beginform();