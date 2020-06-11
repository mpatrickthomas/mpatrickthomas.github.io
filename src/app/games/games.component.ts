import { Component, OnInit } from '@angular/core';
import { faExternalLinkAlt } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-games',
  templateUrl: './games.component.html',
  styleUrls: ['./games.component.css']
})
export class GamesComponent implements OnInit {
  faExternalLinkAlt=faExternalLinkAlt;
  
  gameslist = { 
              "Cities: Skylines" : "https://store.steampowered.com/app/255710/Cities_Skylines/",
              "Fran Bow": "https://store.steampowered.com/app/362680/Fran_Bow/",
              "Half-Life 2": "https://store.steampowered.com/app/220/HalfLife_2/",
              "Animal Crossing: New Horizons":"https://animal-crossing.com/",
              "Stardew Valley":"https://store.steampowered.com/app/413150/Stardew_Valley/",
              "Subnautica":"https://store.steampowered.com/app/264710/Subnautica/"
  }

  constructor() { }

  ngOnInit(): void {
  }

}
