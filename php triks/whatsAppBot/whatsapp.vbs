dim message
dim number

set objFile=CreateObject("Scripting.FileSystemObject").OPenTextFile("number.txt",1)
do while not objFile.AtEndOfStream
number=objFile.ReadLine()
	message=URLEncode("Hi Hello I m Vishal")
	set shell=WScript.CreateObject("WScript.Shell")
	shell.run("https://web.whatsapp.com/send?phone="&number&"&text="&message)
	WScript.sleep(8000)
	shell.SendKeys "{ENTER}"
	WScript.sleep(4000)
	shell.SendKeys "^w"
Loop
objFile.close


Public Function URLEncode( StringVal )
  Dim i, CharCode, Char, Space
  Dim StringLen
  StringLen = Len(StringVal)
  ReDim result(StringLen)

  Space = "+"
  'Space = "%20"

  For i = 1 To StringLen
    Char = Mid(StringVal, i, 1)
    CharCode = AscW(Char)
    If 97 <= CharCode And CharCode <= 122 _
    Or 64 <= CharCode And CharCode <= 90 _
    Or 48 <= CharCode And CharCode <= 57 _
    Or 45 = CharCode _
    Or 46 = CharCode _
    Or 95 = CharCode _
    Or 126 = CharCode Then
      result(i) = Char
    ElseIf 32 = CharCode Then
      result(i) = Space
    Else
      result(i) = "&#" & CharCode & ";"
    End If
  Next
  URLEncode = Join(result, "")
End Function