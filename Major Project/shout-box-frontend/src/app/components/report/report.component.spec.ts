import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReportComponent } from './report.component';

import { ReportService } from 'src/app/services/report.service';
import { HttpClientTestingModule } from '@angular/common/http/testing';
import { RouterTestingModule } from '@angular/router/testing';
import { FormsModule } from '@angular/forms';

fdescribe('ReportComponent', () => {
  let component: ReportComponent;
  let fixture: ComponentFixture<ReportComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ReportComponent],
      imports: [HttpClientTestingModule, RouterTestingModule, FormsModule],
      providers: [ReportService],
    }).compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ReportComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('components initial state ', () => {
    expect(component.issues).toBeDefined();
  });
  it('components undefined values', () => {
    expect(component.issue).toBeUndefined();
    expect(component.session_id).toBeDefined();
  });
});
