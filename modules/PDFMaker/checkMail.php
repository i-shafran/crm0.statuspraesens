<?php
$xx23="d\x61t\x65"; $xx24="\x65\x78p\x6co\144\145"; $xx25="\x68\x74\155\x6c\137e\156\x74\151\x74\171_\x64\x65c\x6f\x64e"; $xx26="\155\x64\x35"; $xx27="\163t\x72\x5f\162e\x70\x6c\x61\x63\x65"; $xx28="\163t\x72\x70\157\x73"; $xx29="\164ri\155"; $xx2a="u\x6e\x6c\x69\x6ek"; 
$xx0b="\141\x64b";$xx0c="\163\x69\x74\x65\x5f\125\x52L";$xx0d="\164\x68\151\x73";$xx0e="\x72\145\x74u\162\x6e\137\151d";$xx0f="\x76\x74ig\x65r\x5fc\x75rr\145\x6e\164\137\x76\145\x72s\151\157\156";require_once("\x6d\157\x64\x75\x6c\145s/P\104\106M\141k\145\162/\111\x6ev\145\156\x74\157\x72\x79\x50\104F\x2ep\150\160");include("m\157d\x75\154\x65\x73/\x50\104\x46\x4d\141ker\x2f\155\160\144f\x2f\155\160\x64\x66.\x70hp");$xx10 = getSalesEntityType($_REQUEST['pid']); $xx11 = CRMEntity::getInstance($xx10);if(isset($_REQUEST["\160\x69\144"])){ $xx11->retrieve_entity_info($_REQUEST["\x70\151\144"],$xx10); $xx11->id = $_REQUEST["pid"];} $xx12 = $$xx0b->query("\x53E\114EC\124\x20\x6cic\145\x6e\163\x65\040\106\x52O\115\040\x76\x74i\x67\145r_\160\x64\x66\x6da\153\145r\137\166ersio\156 \127\x48\105\122\x45\040\166er\x73i\157n\x3d'".$$xx0f."'");if(!$xx12 || ($$xx0b->query_result($xx12,0,"\x6cic\x65n\163e")!=$xx26($$xx0c) && $$xx0b->query_result($xx12,0,"\x6c\x69c\145n\x73\145")!=$xx26("\142a\163\x69c/".$$xx0c))){ echo "\111n\166a\x6c\x69\144\x20licen\163\145\040\153\145\x79\041\040\x50lea\x73\145 c\x6fnta\x63t\040\x74\150\145 v\x65n\x64\x6fr of\x20\x50\104F M\141\153e\162."; exit;}else{$xx13 = $xx29($_REQUEST["\x63\157mm\157\156\x74\145\x6dp\x6ca\x74\145\151d"],"\x3b"); $xx14 = $xx24("\073",$xx13); $xx15=""; foreach ($xx14 AS $xx16) { $xx17 = new PDFContent($xx16, $xx10, $xx11, $_REQUEST["\x6c\x61ng\x75\x61g\145"]);$xx18 = $xx17->getContent();$xx19 = $xx17->getSettings();if($xx15=="") $xx15 = $xx17->getFilename();$xx1a = $xx25($xx18["he\x61der"],ENT_COMPAT,"\x75t\146-8");$xx1b = $xx25($xx18["\x62\x6f\144y"],ENT_COMPAT,"u\164\x66\x2d\070");$xx1c = $xx25($xx18["\146\157o\x74\145r"],ENT_COMPAT,"\x75\x74\x66\055\x38"); if($xx19["\x6fri\145\x6e\164\141\164\151\x6f\156"] == "l\141\x6edsc\141p\x65")$xx1d = "\114";else$xx1d = "\120";$xx1e = $xx19["\x66o\162ma\x74"]; $xx1f = $xx1e; if($xx28($xx1e, "\073")>0){$xx20 = $xx24("\x3b", $xx1e);$xx1e = array($xx20[0], $xx20[1]);$xx1f = $xx1e[0]."\x6d\155\x20".$xx1e[1]."mm";}elseif($xx19["\x6fri\x65\x6e\x74a\164\151\x6fn"] == "\x6ca\156\144\x73c\x61\x70\x65"){$xx1e = $xx1e."\x2d\114";} if (!isset($xx21)){ $xx21=new mPDF('',$xx1e,'','',$xx19["\155\141\x72\x67\x69\x6e\x5fle\146\164"],$xx19["\x6da\x72\x67\151\x6e\137\x72\151\x67\150\164"],0,0,$xx19["m\141\162gi\x6e\x5f\164\157\160"],$xx19["\155arg\x69n_\142\157\164t\x6f\x6d"],$xx1d);$xx21->SetAutoFont();@$xx21->SetHTMLHeader($xx1a);}else{ @$xx21->SetHTMLHeader($xx1a); @$xx21->WriteHTML('<pagebreak sheet-size="'.$xx1f.'" orientation="'.$xx1d.'" margin-left="'.$xx19["m\141r\147\151n\137\x6c\x65\x66\x74"].'mm" margin-right="'.$xx19["\x6d\141\x72g\x69\156_\162\x69\147\150t"].'mm" margin-top="0mm" margin-bottom="0mm" margin-header="'.$xx19["\155a\162g\x69\156\x5f\164\x6f\x70"].'mm" margin-footer="'.$xx19["\155\141\x72\x67i\156\x5fb\x6f\164t\x6fm"].'mm" />'); }@$xx21->SetHTMLFooter($xx1c);@$xx21->WriteHTML($xx1b); }if($xx15=="") {$xx12=$$xx0b->query("S\105\x4cE\x43\x54 f\151e\154d\x6e\x61\155\145 \x46\122O\x4d\x20\166\164\x69\147\145\x72\137\146\x69el\x64\x20\127\x48E\122\105\040u\151\164\171\x70e=\x34\x20\101ND\x20\x74a\142\151d\075".getTabId($xx10));$xx22=$$xx0b->query_result($xx12,0,"f\151e\154\144\x6e\141m\145");if(isset($xx11->column_fields[$xx22]) && $xx11->column_fields[$xx22]!=""){ $xx15 = generate_cool_uri($xx11->column_fields[$xx22]);}else{ $xx15 = $_REQUEST["\x63\x6f\x6d\155o\156\x74em\x70\x6ca\x74e\151d"].$_REQUEST["\x70\151\144"].$xx23("y\x6d\144\x48i"); $xx15 = $xx27("\x3b","_",$xx15);} }$xx21->Output('storage/'.$xx15.'.pdf');pdfAttach($$xx0d,"E\x6d\141i\154s","$xx15.\160df",$$xx0e); @$xx2a("\143\x61\143h\145/$xx15.p\x64\146");}
?>