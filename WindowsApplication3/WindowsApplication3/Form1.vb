Public Class Form1

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Help.ShowHelp(Me, "Relatório Projeto LP.chm")
    End Sub

   

    
    Private Sub PáginaPrincipalToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles PáginaPrincipalToolStripMenuItem.Click
        Form2.ShowDialog()
    End Sub

    Private Sub InserirUtilizadorToolStripMenuItem_Click(sender As Object, e As EventArgs) Handles InserirUtilizadorToolStripMenuItem.Click
        Form3.ShowDialog()

    End Sub
End Class
