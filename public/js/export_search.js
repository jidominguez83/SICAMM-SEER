const protocol = window.location.protocol;
const host = window.location.host;
const localhost = protocol + '//' + host;

export class search{
    constructor(myurlp, mysearchp, ul_add_lip){
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_li = ul_add_lip;
        this.idli = "mylist";
    }

    InputSearch(){
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();
            try{
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                
                if(valor.length > minimo_letras){
                    let datasearch = new FormData();
                    datasearch.append("valor", valor);

                    fetch(this.url,{
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        body: datasearch
                    })
                    .then((data) => data.json())
                    .then((data) => {
                        console.log(data);
                        this.Showlist(data, valor);
                    })
                    .catch(function(error){
                        console.error("Error: ", error);
                    });
                } else {
                    this.ul_add_li.style.display = "";
                }
            } catch (error) {
                console.log(error);
            }
        });
    }

    Showlist(data, valor){
            if(data.results != ""){
                let arrayp = data.results;
                this.ul_add_li.innerHTML = "";
                let n = 0;
                this.Show_list_each_data(arrayp, valor, n);
            } else {
                this.ul_add_li.innerHTML = "";
                this.ul_add_li.innerHTML += `
                    <div class="alert alert-danger" role="alert">
                        No se encontró ninguna coincidencia
                    </div>
                    `;
            }
    }

    Show_list_each_data(arrayp, valor, n){
        for (let item of arrayp){
            n++;
            let data_curp = item.curp;
            this.ul_add_li.innerHTML += `
                <li class="list-group-item" id="${n+this.idli}">
                    <a href="/participantes/detalles/${item.id}" class="btn btn-light">
                        <strong>${data_curp.substr(0,valor.length)}</strong>${data_curp.substr(valor.length)} - ${item.nombre} ${item.apellido_paterno} ${item.apellido_materno}
                    </a>
                </li>
            `;
        }
    }
}