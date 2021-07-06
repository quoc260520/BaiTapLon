using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Diagnostics;
namespace BTL_HDH
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Process.Start("winword.exe");
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Process.Start("EXCEL.EXE"); 
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Process.Start("POWERPNT.EXE");
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Process.Start("mspaint.exe");
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Process.Start("chrome.exe");

        }


        private void button6_Click(object sender, EventArgs e)
        {

            Process.Start("notepad.exe");
        }

        private void button7_Click(object sender, EventArgs e)
        {
            try
            {
                foreach (var process in Process.GetProcessesByName(comboBox1.Text))
                {
                    process.Kill();
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Lỗi vui lòng thử lại");
            }
        }

        private void button8_Click(object sender, EventArgs e)
        {
            try
            {
                string text = txtStart.Text;
                Process process = new Process();
                process.StartInfo.FileName = text;
                process.Start();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Không thể mở chương trình"); 
            }
        }
    }
}
