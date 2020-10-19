
/**
 * PROPIEDADES
 */
var sfProperties = {
    selector: document.querySelector("#category_name"),
    tagSelector: document.querySelector("#tag"),  
    the_select: document.createElement('select'),
    the_label: document.createElement('label'),
    molSelector: document.querySelector("#tag"),
    disablers: false
}

/**
 * METODOS
 */

 var sfMethods = {

    beginform: function(){

        sfProperties.selector.addEventListener("change", sfMethods.onchange);
        
        if (sfProperties.disablers) {
            sfProperties.selector.addEventListener("change", sfMethods.tagDisabler);
            sfProperties.tagSelector.addEventListener("change", sfMethods.catDisabler);
        }
        
    },
    tagDisabler: function(selected){
        var selectedOption = selected.target.options[selected.target.selectedIndex].text;

        selectedOption == "Todas" ? sfProperties.tagSelector.disabled = false : sfProperties.tagSelector.disabled = true;
    },

    catDisabler: function(selected){
        var selectedOption = selected.target.options[selected.target.selectedIndex].text;
        
        selectedOption == "Todas" ? sfProperties.catSelector.disabled = false : sfProperties.catSelector.disabled = true;
    },

    onchange: function(selected){
        var selected_option = selected.target.options[selected.target.selectedIndex].text;
        var selected_slug = selected.target.options[selected.target.selectedIndex].value;
        

        sfProperties.the_select.innerHTML = "";
        sfProperties.the_label.innerHTML = "";
        sfMethods.create_select(selected_option, selected_slug);
    },

    create_select: function(name, slug){

        sfProperties.the_select.setAttribute('id', 'sub_category');
        sfProperties.the_select.setAttribute('name', 'product_cat');
        sfProperties.the_select.setAttribute('class', 'sf_form_select');
        sfProperties.the_select.style.display = 'none';

        

        if(name != 'Todas'){

            sfMethods.fill_select(name, slug);
            
            sfProperties.the_label.setAttribute('for', 'sub_category');
            sfProperties.the_select.setAttribute('class', 'sf_label');
            sfProperties.the_label.innerHTML = 'Subcategoría';
            sfProperties.the_label.style.display = 'none';
            sfProperties.the_label.style.padding = '10px 0';

            sfProperties.selector.parentNode.insertBefore(sfProperties.the_label, sfProperties.selector.nextSibling);
            sfProperties.selector.parentNode.insertBefore(sfProperties.the_select, sfProperties.the_label.nextSibling);

            setTimeout(function(){

                sfProperties.the_label.style.transition = ".8s all ease-in-out";
                sfProperties.the_label.style.display = 'block';          
                sfProperties.the_label.style.opacity = 0;
                
                sfProperties.the_select.style.transition = ".8s all ease-in-out";
                sfProperties.the_select.style.display = 'block';          
                sfProperties.the_select.style.opacity = 0;
            }, 100);
            
            setTimeout(function(){

                sfProperties.the_label.style.opacity = 1; 
                sfProperties.the_select.style.opacity = 1;
            }, 150);
        }
        
        
        
    },

    fill_select: function(selected_name, selected_slug){

        var selected_category =  sf.data[selected_name]['sub-categories'];
        var array_of_selected = Object.values(selected_category);

        var option_all = document.createElement('option');
        option_all.setAttribute('value',selected_slug);       
        option_all.innerHTML = 'Todas';
        sfProperties.the_select.appendChild(option_all);

        for (var iterator = 0; iterator < array_of_selected.length; iterator++){

        var option = document.createElement('option');
        var name =  array_of_selected[iterator].name;
        var slug = array_of_selected[iterator].slug;  

        option.setAttribute('value',slug);
        option.innerHTML = name;
        sfProperties.the_select.appendChild(option);    
            
        }

    }

 }

 sfMethods.beginform();