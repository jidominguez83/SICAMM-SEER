import {search} from './export_search.js';

const mysearchp = document.querySelector("#search_participante");
const ul_add_lip = document.querySelector("#ul_result_participantes");
const myurlp = '/participantes/buscar';
const searchparticipante = new search(myurlp, mysearchp, ul_add_lip);

searchparticipante.InputSearch();