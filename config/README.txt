Nubevest AI chatbot — configuration
====================================

1. Get an Anthropic API key
   https://console.anthropic.com/  →  Settings  →  API Keys  →  Create Key

2. Set the key. Choose ONE of the two options:

   OPTION A — environment variable (recommended, safer)
     Windows (PowerShell, current shell only):
       $env:ANTHROPIC_API_KEY = "sk-ant-..."
     Windows (permanent, needs shell restart):
       setx ANTHROPIC_API_KEY "sk-ant-..."
     Linux/macOS:
       export ANTHROPIC_API_KEY="sk-ant-..."

     Then restart Apache so PHP picks up the new env var.

   OPTION B — edit config/ai.php
     Change:  'api_key' => getenv('ANTHROPIC_API_KEY') ?: '',
     To:      'api_key' => 'sk-ant-...',      // paste your key
     NEVER commit this file to git after adding a real key.

3. Test it — visit any page, the "Chat with Nubi" launcher appears in
   the bottom-right corner. Click it and send a message.

4. Model / cost
   Default model is Haiku 4.5 (fast + affordable). To switch, edit
   'model' in config/ai.php. Haiku pricing is roughly cents per
   thousand messages.

5. Files
   - config/ai.php            API key + model settings
   - api/chat.php             backend endpoint (Anthropic Messages API)
   - assets/css/chatbot.css   widget styles
   - assets/js/chatbot.js     widget UI
   - includes/footer.php      loads the widget on every page

6. Session
   Conversation history lives in the PHP session on the server, and
   a local mirror in the visitor's localStorage so the widget re-opens
   with prior context. The Reset button clears both.
