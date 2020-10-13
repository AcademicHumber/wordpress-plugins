<script>
/**
 * PROPIEDADES
 */
var brand_selector = {
    selector: document.querySelector("#category_name"),    
    the_select: document.createElement('select'),
    the_label: document.createElement('label') 
}

/**
 * METODOS
 */

 var methods_selector = {

    beginform: function(){

        brand_selector.selector.addEventListener("change", methods_selector.onchange);         
        
    },

    onchange: function(selected){
        var selected_option = selected.target.options[selected.target.selectedIndex].text;
        var selected_slug = selected.target.options[selected.target.selectedIndex].value;

        brand_selector.the_select.innerHTML = "";
        brand_selector.the_label.innerHTML = "";
        methods_selector.create_select(selected_option, selected_slug);
    },

    create_select: function(name, slug){

        brand_selector.the_select.setAttribute('id', 'sub_category');
        brand_selector.the_select.setAttribute('name', 'product_cat');
        brand_selector.the_select.setAttribute('class', 'sf_form_select');
        brand_selector.the_select.style.display = 'none';

        methods_selector.fill_select(name, slug);

        if(name != 'Todas'){

            brand_selector.the_label.setAttribute('for', 'sub_category');
            brand_selector.the_select.setAttribute('class', 'sf_label');
            brand_selector.the_label.innerHTML = 'Subcategoría';
            brand_selector.the_label.style.display = 'none';
            brand_selector.the_label.style.padding = '10px 0';

            brand_selector.selector.parentNode.insertBefore(brand_selector.the_label, brand_selector.selector.nextSibling);
            brand_selector.selector.parentNode.insertBefore(brand_selector.the_select, brand_selector.the_label.nextSibling);

            setTimeout(function(){

                brand_selector.the_label.style.transition = ".8s all ease-in-out";
                brand_selector.the_label.style.display = 'block';          
                brand_selector.the_label.style.opacity = 0;
                
                brand_selector.the_select.style.transition = ".8s all ease-in-out";
                brand_selector.the_select.style.display = 'block';          
                brand_selector.the_select.style.opacity = 0;
            }, 100);
            
            setTimeout(function(){

                brand_selector.the_label.style.opacity = 1; 
                brand_selector.the_select.style.opacity = 1;
            }, 150);
        }
        
        
        
    },

    fill_select: function(selected_name, selected_slug){

        var selected_category =  sf.data[selected_name]['sub-categories'];
        var array_of_selected = Object.values(selected_category);

        var option_all = document.createElement('option');
        option_all.setAttribute('value',selected_slug);       
        option_all.innerHTML = 'Todas';
        brand_selector.the_select.appendChild(option_all);

        for (var iterator = 0; iterator < array_of_selected.length; iterator++){

        var option = document.createElement('option');
        var name =  array_of_selected[iterator].name;
        var slug = array_of_selected[iterator].slug;  

        option.setAttribute('value',slug);
        option.innerHTML = name;
        brand_selector.the_select.appendChild(option);    
            
        }

    }

 }

 methods_selector.beginform();

 </script>