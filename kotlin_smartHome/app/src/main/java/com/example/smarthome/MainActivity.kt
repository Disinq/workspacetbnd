package com.example.smarthome

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.webkit.WebView
import android.webkit.WebViewClient
import android.widget.Button
import android.widget.ImageButton
import android.widget.ImageView

private lateinit var varWebView: WebView
private lateinit var varBtnOff: ImageButton
private lateinit var varBtnOn: ImageButton
private lateinit var varBtnBlink: Button

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        //webView
        varWebView = findViewById(R.id.webView)
        varWebView.webViewClient = WebViewClient()
        varWebView.settings.javaScriptEnabled = true
        varWebView.loadUrl("https://tbonaldi.etudiant.eemi.tech")

        // btnOff
        varBtnOff = findViewById(R.id.btnOff)
        varBtnOff.setOnClickListener{
            varWebView.loadUrl("https://833d-2a04-cec0-11c0-3661-c978-bfa0-5ad3-bd94.ngrok-free.app//light/off")
        }

        // btnOn
        varBtnOn = findViewById(R.id.btnOn)
        varBtnOn.setOnClickListener{
            varWebView.loadUrl("https://833d-2a04-cec0-11c0-3661-c978-bfa0-5ad3-bd94.ngrok-free.app//light/on")
        }

        // btnBlink
        varBtnBlink = findViewById(R.id.btnBlink)
        varBtnBlink.setOnClickListener{
            varWebView.loadUrl("https://833d-2a04-cec0-11c0-3661-c978-bfa0-5ad3-bd94.ngrok-free.app//light/blink")
        }

    }
}