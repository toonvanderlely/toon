import { Controller } from "stimulus"

export default class extends Controller {

	static targets = ["type", "sizes"]
  
	connect(){
		this.update();
	}

	update() {


		var selected = this.typeTarget.selectedOptions[0].value;
		
		var sizes = this.sizesTarget.children;

		Array.prototype.forEach.call(sizes, function (select){
			if(select.dataset.type == selected)
			{
				select.style.display = "initial"
				select.name = "size"
			}
			else
			{
				select.style.display = "none"
				select.name = ""
			}
		})

		
	}
}
