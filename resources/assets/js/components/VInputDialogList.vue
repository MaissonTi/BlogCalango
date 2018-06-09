<template>
  <div>

    <div class="form-group form-float div-search">                                        
        
        <div class="group-search">
            <label class="form-label">{{ title }}</label>  
            <div class="form-line">
                <input id="input-search" type="text" class="form-control" required disabled/>                      
                <input type="hidden" v-bind:name="name" v-bind:value="inputValue"/>                      
            </div>       
        </div>

        <a v-if="list" v-on:click="openModel" class="btn btn-default waves-effect">
            <i class="material-icons ">search</i>
        </a>

        <a v-if="!list" class="btn btn-default waves-effect">
            <i class="material-icons fa-spin">autorenew</i>
        </a>

    </div>


    <div class="modal fade modalCustom" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">{{ title }}</h4>
                </div>
                <div class="modal-body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable jsDataTable">
                                    <thead>
                                        <tr>  
                                            <th class="th-action" style="width: 50px;"> <center>Ação</center>  </th>                                          
                                            <th v-for="item in fields" :key="item.id">{{ item }}</th>                                    
                                        </tr>
                                    </thead>                                   
                                    <tbody> 
                                        <tr v-for="item in list" :key="item.id"> 
                                            <th style="width: 50px;">   
                                                <div class="btn-center">                                                   
                                                    <a @click='returnId(item)' data-dismiss="modal" class="btn bg-green btn-block btn-xs waves-effect" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar">
                                                            <i class="material-icons">done</i>
                                                    </a>
                                                </div> 
                                            </th>
                                            <td v-for="i in item" :key="i.id">{{i}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                </div>
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
    export default {
        data() {
            return {
                list: null,
                datatableLoad:false,
                idSearch:null,
                inputValue:null
            }
        },
        mounted() {            
            this.getAll()                     
        },
        computed:{
            
        },
        props:['url', 'title', 'model', 'fields', 'id', 'name', 'where', 'order', 'value'],   
        methods:{                     
            openModel:function(event){

                if(!this.datatableLoad){
                    
                    $('.jsDataTable').DataTable({ 
                        dom: '<"dtflex"f>rtip', 
                        responsive: true,  
                    }); 

                    this.datatableLoad = true;
                }

                $('.modalCustom').modal() 
                                                     
            },     
            getAll:function(){
                
                let config = {
                    table: 'tb_cliente',
                    fields: ['id', 'nome']
                };

                axios.get('/blogcalango/public/comp/' + JSON.stringify(config) )
                .then(response => {
                    this.list = response.data.data;                 
                })
                .catch(e => {
                console.log(e);
                })

            },
            returnId:function(item){                      
            
                 $('#input-search').val(item.nome)
                 this.inputValue = item.id;                    
                 $.AdminBSB.input.activate();

            },
            setFocusClear: function()
            {
                this.$refs.search.value = ''
            }
            
        } 
    }
</script>

<style>

.group-search{
    width: 100%;
}

/*Input and button*/
.div-search{
    display: flex;
    align-items: flex-end;
}
.div-search .form-line{
    margin-right: 5px;
}

/*Title*/
.modal-header h4{
    border-bottom: 1px solid #eaeaea;
}    

/*Animation icon*/
.fa-spin {
    
    -webkit-animation: fa-spin 2s infinite linear;
    animation: fa-spin 2s infinite linear;
}

@keyframes fa-spin{
    0%{
        -webkit-transform:rotate(0deg);
        transform:rotate(0deg)
    }
    100%{
        -webkit-transform:rotate(359deg);
        transform:rotate(359deg)
        }
    }

</style>

