
class Ajax {

	ejecutar(){
		return new Promise((resolve, reject)=>{
        	$.ajax(this.options).done(resolve).fail(reject)
    	})
	}

	setData(object){
		this.options = object
	}
	setDataForm(object){
		this.options = object;
		this.options.cache = false;
		this.options.contentType = false;
		this.options.processData = false;
	}

}

let OptionsAjax = {
    url : "views/ajax/ajax.php",
    type : "POST",
    dataType : "JSON"
}

let ajax = new Ajax()
