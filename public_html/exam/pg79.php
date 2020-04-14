<body>
  <form method="post" action="pg85.php">
    <img src="images/user.gif" alt="User" /><br />
    <span style="color:blue;">
      Please fill out the fields below.<br />
    </span>
    <img src="images/fname.gif" alt="First Name"/>
    <input type="text" name="fname" /><br/>

    <img src="images/email.gif" alt="Email" />
    <input type="text" name="email" /><br/>

    <img src="images/phone.gif" alt="Phone" />
    <input type="text" name="phone" /><br/>

    <span style="font-size: 10pt">
      Must be in the form (555)555-555
    </span>
    <br/>
    <br/>

    <img src="images/downloads.gif" alt="Publications"/><br />

    <span style="color:blue">
      Which book would you like information about?
    </span>
    <br />

    <select name="book">
      <option>Internet and WWW How to program 3e</option>
      <option>C++ how to program 4e</option>
      <option>Java how to program 5e</option>
      <option>XML How to Program 1e</option>
    </select>
    <br/><br/>

    <img src="images/os.gif" alt="Operating System" ?>
    <br/>
    <span style="color:blue">
      Which operating system are you currently using?
    <br/>
    </span>

    <input type="radio" name="os" value="Windows XP" checked="checked" />
    Windows XP
    <input type="radio" name="os" value="Windows 2000" />
    Windows 2000
    <input type="radio" name="os" value="Windows 98" />
    Windows 98
    <br />
    <input type="radio" name="os" value="Linux" />
    Linux
    <input type="radio" name="os" value="Other" />
    Other
    <br />
    <input type="submit" value="Register" />
  </form>
</body>