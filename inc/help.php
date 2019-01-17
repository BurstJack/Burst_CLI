<?php
function help() {
      echo "                                                                \n";
      echo "                                                                \n";
      echo "               AVAILABLE COMMANDS                               \n";
      echo "                                                                \n";
      echo "       bl last <n>;     # lists last n blocks in chain          \n";
      echo "       bl -l last <n>;  # lists (long) last n blocks in chain   \n";
      echo "       bl <height>;     # lists details in block <height>       \n";
      echo "       tx <txid>;       # lists details in transaction <txid>   \n";
      echo "       at <account>;    # lists AT details for AT <account>     \n";
      echo "       ats all;         # lists all ATs in chain                \n";
      echo "       ats -l all;      # lists (long) all ATs in chain         \n";
      echo "       ats -s <str>;    # search chain for ATs with string <str>\n";
      echo "       quit;                                                    \n";
      echo "                                                                \n";
      echo "                                                                \n";
  }


?>
