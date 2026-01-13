
export class studentInfo{
    constructor(ID, Fname, Lname, Mname, program, Grade, Semester, PaymentStatus){
        this.ID = ID;
        this.Fname = Fname;
        this.Lname = Lname;
        this.Mname = Mname;
        this.program = program;
        this.Grade = Grade;
        this.Semester = Semester;
        this.PaymentStatus = PaymentStatus;
    }
}
export class paymentInfo{
    balance = 1000;
    total = 2000;
    dueDate = "2023-12-31";
    total = 2000;
}


export class courseInfo{
    constructor(){
        this.courseName = ["math","English","Amharic","Biology","Physics","Chemistry","Aptitude","History","Geography","Computer","Sport","Art","SpokenEnglish","Civics", "Economics","Science","Music"];
        this.courseCode = ["MATH101","ENG101","AMH101","BIO101","PHY101","CHEM101","APT101","HIST101","GEO101","COMP101","SPORT101","ART101","SPEAK101","CIVICS101","ECON101","SCI101","MUS101"];
        this.courseGrade = [1,2,3,4,5,6,7,8,9,10,11,12];
    }
}









export function displayCourses(student){
    const courses = new courseInfo();
    if(student.Grade === "1" || student.Grade === "2" || student.Grade === "3" || student.Grade === "4"){
        console.log("Grade 1 courses:");
        console.log(coursesByGrade["1"]);
    }else if(student.Grade === "5" || student.Grade === "6" ||student.Grade === "7" ||student.Grade === "8"){
        console.log("Grade 5 courses:");
        console.log(coursesByGrade["5"]);
    }else if(student.Grade === "9" || student.Grade === "10"){
        console.log("Grade 9 courses:");
        console.log(coursesByGrade["9"]);
    }else if(student.Grade === "11" || student.Grade === "12"){
        console.log("Grade 11 courses:");
        console.log(coursesByGrade["11"]);
    }
}



export const Course = [
    {
        id: "1",
        title: "Database Management",
        results: [19, 5, 10, 7, 30] // Mid, Assess, Lab, Project, Final
    },
    {
        id: "2",
        title: "Database Structure",
        results: [20, 10, 10, 10, 50]
    },
    {
        id: "3",
        title: "Computer Graphics",
        results: [15, 8, 5, 9, 40]
    },
    {
        id: "4",
        title: "Computer Networking",
        results: [18, 9, 10, 8, 45]
    },
    {
        id: "5",
        title: "History of Ethiopia",
        results: [20, 10, 10, 10, 48]
    }
];




export const teachersInfo = [
    { id:"ugr/0001", name: "Mrs. Emily Ha", subject: "Mathematics", Email: "ama@gmail.com", officeLocation: "Block 22, Room 5", officeHoures: "Mon/Fri 9am-5pm", stars: "5", department: "MRKT", phone: "+251911206545", image: "./IMG/pexels-minan1398-654696.jpg" },
    { id:"ugr/0002",  name: "Mr. John Smith", subject: "Physics", Email: "john.smith@gmail.com", officeLocation: "Block 22, Room 6", officeHoures: "Mon/Fri 9am-5pm", stars: "4", department: "COSC", phone: "+251911206546", image: "./IMG/pexels-rachel-valdes-martinez-893138605-19987431.jpg" },
    { id:"ugr/0003",  name: "Mrs. Sarah Williams", subject: "Chemistry", Email: "michael.johnson@gmail.com", officeLocation: "Block 22, Room 7", officeHoures: "Mon/Fri 9am-5pm", stars: "3", department: "BUAD", phone: "+251911206547", image: "./IMG/pexels-tamra-creatives-agency-19163950-6497112.jpg" },
    { id:"ugr/0004",  name: "Dr. Dave King", subject: "Data Structures", Email: "sarah.w@gmail.com", officeLocation: "Block 10, Room 12", officeHoures: "Tue/Thu 10am-12pm", stars: "2", department: "MRKT", phone: "+251911000004", image: "./IMG/pexels-allan-2155569510-33799456.jpg" },
    { id:"ugr/0005",  name: "Mr. Abel Tesfaye", subject: "Algorithm Design", Email: "abel.t@gmail.com", officeLocation: "Block 10, Room 05", officeHoures: "Wed/Fri 2pm-4pm", stars: "1", department: "COSC", phone: "+251911000005", image: "./IMG/pexels-mika-mark-51669800-15019490.jpg" },
    { id:"ugr/0006",  name: "Mr. Harry Potter", subject: "Web Development", Email: "bethy.a@gmail.com", officeLocation: "Block 05, Room 22", officeHoures: "Mon/Wed 8am-10am", stars: "5", department: "COSC", phone: "+251911000006", image: "./IMG/pexels-mika-mark-51669800-15023413.jpg" },
    { id:"ugr/0007",  name: "Dr. Ron Burgundy", subject: "Database Systems", Email: "kebede.l@gmail.com", officeLocation: "Block 10, Room 18", officeHoures: "Mon/Fri 1pm-3pm", stars: "4", department: "MRKT", phone: "+251911000007", image: "./IMG/pexels-iphanyi-ezemenari-409200203-14950779.jpg" },
    { id:"ugr/0008",  name: "Mr. Elias Haile", subject: "Operating Systems", Email: "elias.h@gmail.com", officeLocation: "Block 12, Room 01", officeHoures: "Tue/Thu 3pm-5pm", stars: "3", department: "COSC", phone: "+251911000008", image: "./IMG/pexels-amiresel-6102841.jpg"},
    { id:"ugr/0009",  name: "Mr. Thomas Brown", subject: "Network Security", Email: "selam.d@gmail.com", officeLocation: "Block 05, Room 14", officeHoures: "Wed/Fri 9am-11am", stars: "2", department: "BUAD", phone: "+251911000009", image: "./IMG/pexels-ricardosantanna-28408585.jpg" },
    { id:"ugr/0010",  name: "Dr. Selamawit Desta", subject: "Artificial Intelligence", Email: "thomas.b@gmail.com", officeLocation: "Block 10, Room 20", officeHoures: "Mon/Thu 11am-1pm", stars: "1", department: "MRKT", phone: "+251911000010", image: "./IMG/pexels-lara-chara-24037705-7665706.jpg" },
    { id:"ugr/0011",  name: "Pr. Elon Trump", subject: "Software Engineering", Email: "yared.g@gmail.com", officeLocation: "Block 10, Room 09", officeHoures: "Tue/Fri 4pm-6pm", stars: "5", department: "BUAD", phone: "+251911000011", image: "./IMG/pexels-olly-3823495.jpg"}
];   





