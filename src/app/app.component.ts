import { Component, ViewChild } from '@angular/core';
import { MatSidenav } from '@angular/material/sidenav';
import { MatDialog } from '@angular/material/dialog';
import { MatSnackBar } from '@angular/material/snack-bar';
import { faLinkedin, faGithub } from '@fortawesome/free-brands-svg-icons';
import { faEnvelope } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  faLinkedin = faLinkedin;
  faGithub = faGithub;
  faEnvelope = faEnvelope;

  WIPText = "This page is a work in progress, what you're seeing is far from the final product";

  @ViewChild('sidenav') sidenav: MatSidenav;
  
  menuOpen = false;

  constructor(
    public dialog: MatDialog,
    private snackbar: MatSnackBar
    ){}

  closeSideNav(){
    this.sidenav.close();
  }
}
