class Select {
    constructor(selector,options) {
        this.$el = selector;
        this.multy = options.multy ?? false;
        this.placeholder = options.placeholder ?? "Choose item";
        this._selected = [];
        this.#setup();
    }


    get selected () {
        return this._selected;
    }

    set selected (selectedItems) {
        this._selected = selectedItems;
        this.render();
    }


    #setup() {
        this.clickHandler = this.clickHandler.bind(this);
        this.$el.querySelector('.dropdown__title').textContent = this.placeholder;
        this.$el.addEventListener('click', this.clickHandler);
    }

    clickHandler(event) {
        const {type} = event.target.dataset;

        if (!type) {
            this.toggle()
        } else if (type === 'item') {
            const selectedItem = {
                id:+event.target.dataset.id,
                value:event.target.textContent
            }
            this.select(selectedItem)
        } else if (type === 'backdrop') {
            this.close()
        }
    }

    get isOpen() {
        return this.$el.classList.contains('open')
    }

    select(selectedItem) {
        if(this.multy){
            if(!this._selected.some(el=>el.id===selectedItem.id)){
                this._selected.push(selectedItem);
            }
            this.render();
        }else{
            this.selectedItem = selectedItem;
            console.log(selectedItem);
            this.$el.querySelector('.dropdown__title').textContent =  selectedItem.value;
        }
        this.close()
    }

    selectedToNode(){
        return this._selected.map(elem => {
            let selectedOption = document.createElement("span");
            selectedOption.classList.add("dropdown__multy");
            selectedOption.addEventListener("click", (e) => {
                e.stopPropagation();
                this._selected = this._selected.filter(el => el.id !== elem.id);
                this.render(this.selectedToNode(this._selected));
            })
            selectedOption.innerHTML =`${elem.value}<input type="hidden" name="feature[]" value="${elem.id}">`;
            return selectedOption;
        });
    }

    render(){
        let rootNode = this.$el.querySelector('.dropdown__title');
        let selectedNodes = this.selectedToNode();
        if(selectedNodes.length===0){
            rootNode.textContent = this.placeholder;
            return;
        }
        rootNode.textContent="";
        selectedNodes.forEach(el=>{
            rootNode.appendChild(el);
        })

    }

    toggle() {
        this.isOpen ? this.close() : this.open();
    }

    open() {
        this.$el.classList.add('open');
    }

    close() {
        this.$el.classList.remove('open') ;
    }

}
