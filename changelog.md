# Changelog

## 2.5.0 (2025-10-06)

* Add: A test the DIFF_IGNORE_LINE_BLANK option ([b794e3d][186])
* Add: Docker compose dev environment. ([06d1b8f][185])
* Add: Json renderer ([46528f2][184])
* Add: Json renderer Options ([94460ef][183], [8bee18d][182])
* Add: More test cases ([33cbfa3][181])
* Add: More tests ([1cf2193][180])
* Add: Test for color output ([2ce76ac][178])
* Add: Test for no changes ([bbf90b5][177])
* Add TupleSort test ([a0323ed][176])
* Add composer test command ([c07c8ac][175])
* Add coverage test ([d039186][174])
* Add local variable ([f09e779][173])
* Add more tests ([1f77317][172], [609c934][171], [e27241d][170], [a65ec6b][169], [5b91f82][168], [f25347a][167], [69a76ca][166], [ff31bb8][165])
* Add statistics function for #97 ([ed1f204][164])
* Add statistics function for #97  "equal" in the switch rather than "notModified" ([188f258][163])
* Bump PHPUnit xml schema to version 9.5 ([cfa3033][162])
* Cut redundant suppression ([073a478][161])
* Fix "Opening brace must not be followed by a blank" ([54124a6][160])
* Fix #125 - Make str_split multibyte save ([7f64374][159])
* Fix: #112 Call to function unset() contains undefined variable $line.([0d45b03][158])
* Fix: Commit URL in changelog ([2ec33c9][157])
* Fix: Formatting ([6ab28a3][156])
* Fix: Line length and CLI test ([bd5d3d3][155])
* Fix: This is impossible due that the start parameter has to be "$start < 0 || $end < 0 || $end < $start" ([b680f9e][154])
* Fix: Title, check if ext-json is loaded ([104e77f][153])
* Fix: Update docs ([69bb28f][152])
* Fix: ignore in coverage test ([b8993e0][151])
* Fix: ignore interface ([975f50e][150])
* Fix PHPMD warnings ([839b0f0][149], [d62afcf][148])
* Fix Readme Typo ([ff0bb29][147])
* Fix docblock ([a9635be][146])
* Fix grammar ([40f418f][145])
* Fix phpdoc and return type ([962623d][144])
* Fix potentially polymorphic call ([160a3ae][143])
* Fix test function length ([7b9bce9][142])
* Optimize: Code clean up ([a947cc7][141])
* Optimize:  Only one argument is allowed per line in a multi-line function call ([56bd9c8][140])
* Optimize Remove unused tupleSort function ([42ea73b][139])
* Optimize SequenceMatcher.php sort. The native PHP sort function is sufficient. There is no need for a callback function tupleSort. ([56ed81d][138])
* Optimize code base #103 ([550312a][137])

## v2.4.0 (2021-10-26)

* Bump changelog ([054d249][136])
* Bump library version und update Changelog ([e88dffb][135])
* Document update grammar in the comments ([3f44195][134])
* Fix PSR-12 code style ([0bf1a08][133])
* Optimize colorize is only used here ([02cf114][132])

## v2.3.3 (2021-08-23)

* Bump library version und update Changelog ([f5ce6bc][131])
* Fix Autoload test classes only in development ([31b4222][130])

## v2.3.2 (2021-03-27)

* Bump library version und update Changelog ([8a83b39][129])
* Fix #90 - Merged Diff shows result only partially ([acbfd7d][128])
* Fix colors ([7eba340][127])
* Fix repeating class assignment of line header ([fb32453][126])
* Fix title attribute values ([533a6bf][125])

## v2.3.1 (2021-02-03)

* Add DigiLive/gitChangelog for change log generation ([0a6a84f][124])

* Add deprecation notice for missing method ([f494b3a][123],
[9403eba][122])

* Add generator for ignored lines ([6b8662e][121],
[4dec4ad][120])

* Add method `generateLinesIgnore` ([6ef61bc][119],
[75f5ce0][118])

* Bump library version ([013f862][117])

* Cut HTML Unified Renderer ([1ba255f][116])

* Document PhpUnit Similarity Test ([7ec484c][115])

* Document Update Changelog ([28e1dc0][114], [c9881d3][113])

* Document disabled inspection ([909e195][112])

* Document generateLinesEqual() ([8a193c9][111])

* Document methods ([9699b5b][110], [7d973d3][109],
[94c8bd5][108])

* Document option `ignoreLines` ([0849a1e][107], [19634bb][106])

* Fix #83 - Lines not properly marked ([6fcafe1][105])

* Fix HTML Merged Renderer ([07da484][104])

* Fix constructor DocBlocks ([b13ff84][103])

* Fix html syntax error ([11ec623][102])

* Fix namespace and unused code ([77a7b59][101])

* Fix probably undefined variable ([3954a2b][100])

* Fix property visibility and method docBlocks ([3bc0839][99])

* Fix property visibility and unused code ([34a032f][98])

* Fix redundant and unused code. ([73f6776][97])

* Optimize Sequence renderer ([576830c][96], [bb0eed4][95])

* Optimize constant usage ([d0cede3][94], [3591515][93])

* Optimize stripping empty/blank lines ([ea6a2e4][92],
[a239f17][91])

* add phpunit config file ([7382ee8][90])

## v2.3.0 (2020-11-19)

* Add Html Merged renderer. ([d70eaf6][89])

* Add PhpUnit test for html merged renderer ([4512c03][88])

* Add calculation for similarity ratio. ([3e4bbe6][87])

* Add choosing marking levels to html example ([c27035a][86])

* Add new marking levels for inline differences ([75358da][85])

* Document properties and constructor ([6c95ccd][84])

* Fix: Html SideBySide renders equal lines of version 1 at both sides.
([ccfc465][83])

* Fix Merged::generateLinesReplace() ([cef85b5][82])

* Fix PSR-4 Auto loading Typo ([6e2ad47][81])

* Fix PhpUnit test ([3ccaa10][80])

* Fix Undefined offset notice ([b10fd38][79])

* Fixes #64 - maxLineMarkerWidth only calculated for input format plain.
([c5f6d72][78])

* Fix generateBlockHeader docBlocks ([b5cfbd5][77])

* Fix visibility of removed lines ([ec0918b][76])

* add changelog ([4b7a56f][75])

* add changelog to Readme file ([09aea70][74])

* add date ([c64c0cc][73])

* add declaration ([cff7db1][72])

* add wiki links to README.md ([ccd5a6d][71])

## v2.2.1 (2020-08-06)

* Fix #58 - Side by side diff shows empty diff ([0946d59][70],
[369b146][69], [02695d5][68])

* add to dev for unit tests ([acd12cb][67])

## v2.2.0 (2020-07-23)

* add line for readabiltity ([e28511b][66])

## v2.1.1 (2020-07-17)

* Fix #50. ([47d6288][65])
* Fix code quality. ([0ef6def][64])
* add unit test for cli output ([0c75757][63])

## v2.1.0 (2020-07-13)

* add plain output for cli ([d7bbe12][62])

## v2.0.0 (2020-07-09)

* Add Cli color support ([4192d8b][61])
* Add dark theme example ([6f41894][60])
* Add example picture ([ee37a28][59])
* add composer scripts descriptions. Update key words ([6bfd4f9][58])
* add missing tag from merge ([639f3cc][57])

## v1.18 (2020-07-01)

* add author ([e132cdb][56])
* add dark theme example ([b9d0ef6][55])

## v1.17 (2020-06-08)

* Fix issue #32. ([7ef67e6][54])
* fix typo in phpdoc ([db259fc][53])

## v1.16 (2020-03-02)

* Add composer package PHP Mess Detector v2.* ([3e527d1][52])

* Add contributor to author lists. ([4c2cbb7][51],
[c11b4ba][50])

* Add trimEqual option. ([98d993e][49])

* Add types of elements for renderer ([4d1b4a0][48],
[83b4104][47])

* Fix PHPMD Violation. ([5d03eae][46])

* Fix expected value for HtmlRendererTest::testUnified()
([fbda2bd][45])

## v1.15 (2020-01-23)

* fix notation ([795fe20][44])

## v1.14 (2019-12-03)

* No changes.

## v1.13 (2019-10-08)

* No changes.

## v1.12 (2019-03-18)

* add more files to .gitignore ([27b21eb][43])
* add phpunit test to composer ([e8a3f71][42])
* add tests ([6d165a6][41])

## v1.11 (2019-02-22)

* No changes.

## v1.10 (2019-02-20)

* fix codacy warnings of unused functions ([8037d99][40])
* fix example ([9207f73][39])

## v1.9 (2019-02-19)

* add comment like in the other file ([8b68a5d][38])
* add stronger type hinting ([3a6ef42][37])

## v1.8 (2019-02-13)

* fix test ([b4cfce1][36])

## v1.7 (2019-01-19)

* add code sniffer PSR2 file ([6fa3c76][35])
* adding curly brackets ([148e787][34])
* fix PSR1.Files.SideEffects.FoundWithSymbols ([fe21917][33])
* fix tabs ([354bf5c][32])

## v1.6 (2019-01-19)

* Fix warning with PHP 7.2 when trying to count NULL ([fe69c4f][31])
* add ci file ([add8165][30])
* add dock block ([2aafad1][29])
* add unit tests ([0db511d][28])
* fix tests ([44a6ab0][27])

## v1.5 (2019-01-15)

* No changes.

## v1.4 (2019-01-14)

* Add PSR4 autoloader ([bda1da9][26])
* add badge ([0fac082][25])
* add keywords ([e64716d][24])
* add name spacing ([1d15164][23])

## v1.3 (2019-01-11)

* Fixed lengths of functions ([3591789][22])
* Fix some typos ([5ca2257][21])
* added missing doc block ([c6f3745][20])
* add lang to html ([1623626][19])
* add second image ([176b647][18])

## v1.2 (2018-01-23)

* added example code from https://github.com/JBlond/php-diff/issues/1
([258b976][17])

* add image to README.md ([0432f78][16])

## v1.1 (2017-05-05)

* Add ability not to expand tabs ([f5da126][15])

* Added note about https://github.com/Xiphe/jQuery-Merge-for-php-diff
([2ebc51f][14])

* Add in working ignoreWhitespace and ignoreCase options (self-describing), fix
up an issue where a diff of two files exactly the same would show the last
$context lines, general cleanup ([690419d][13])

* Add mbstring extension as package dependency ([a929467][12])

* Add missing docblock. Rename isLineDifferent to linesAreDifferent
([516c4be][11])

* Fix ' ([c81931f][10])

* Fix an issue with insertions being skipped. ([b13d23d][9])

* Fix links ([2c38d0e][8])

* Fix tab expansion and deprecated preg_replace use on fixSpaces.
([f0aba03][7])

* Fix the ignoring of option context ([60de296][6])

* add composer file ([be8dc58][5])

* added ' ([09d0c4c][4])

* added License ([3b5b338][3])

* added widget ([d1a5e18][2])

* adding composer manifest to distribute as a library ([9083bd6][1])

* add missing doc blocks ([d3b9a63][0])

## v1.0 (2010-03-11)

* No changes.

[0]:https://github.com/JBlond/php-diff/commit/d3b9a63
[1]:https://github.com/JBlond/php-diff/commit/9083bd6
[2]:https://github.com/JBlond/php-diff/commit/d1a5e18
[3]:https://github.com/JBlond/php-diff/commit/3b5b338
[4]:https://github.com/JBlond/php-diff/commit/09d0c4c
[5]:https://github.com/JBlond/php-diff/commit/be8dc58
[6]:https://github.com/JBlond/php-diff/commit/60de296
[7]:https://github.com/JBlond/php-diff/commit/f0aba03
[8]:https://github.com/JBlond/php-diff/commit/2c38d0e
[9]:https://github.com/JBlond/php-diff/commit/b13d23d
[10]:https://github.com/JBlond/php-diff/commit/c81931f
[11]:https://github.com/JBlond/php-diff/commit/516c4be
[12]:https://github.com/JBlond/php-diff/commit/a929467
[13]:https://github.com/JBlond/php-diff/commit/690419d
[14]:https://github.com/JBlond/php-diff/commit/2ebc51f
[15]:https://github.com/JBlond/php-diff/commit/f5da126
[16]:https://github.com/JBlond/php-diff/commit/0432f78
[17]:https://github.com/JBlond/php-diff/commit/258b976
[18]:https://github.com/JBlond/php-diff/commit/176b647
[19]:https://github.com/JBlond/php-diff/commit/1623626
[20]:https://github.com/JBlond/php-diff/commit/c6f3745
[21]:https://github.com/JBlond/php-diff/commit/5ca2257
[22]:https://github.com/JBlond/php-diff/commit/3591789
[23]:https://github.com/JBlond/php-diff/commit/1d15164
[24]:https://github.com/JBlond/php-diff/commit/e64716d
[25]:https://github.com/JBlond/php-diff/commit/0fac082
[26]:https://github.com/JBlond/php-diff/commit/bda1da9
[27]:https://github.com/JBlond/php-diff/commit/44a6ab0
[28]:https://github.com/JBlond/php-diff/commit/0db511d
[29]:https://github.com/JBlond/php-diff/commit/2aafad1
[30]:https://github.com/JBlond/php-diff/commit/add8165
[31]:https://github.com/JBlond/php-diff/commit/fe69c4f
[32]:https://github.com/JBlond/php-diff/commit/354bf5c
[33]:https://github.com/JBlond/php-diff/commit/fe21917
[34]:https://github.com/JBlond/php-diff/commit/148e787
[35]:https://github.com/JBlond/php-diff/commit/6fa3c76
[36]:https://github.com/JBlond/php-diff/commit/b4cfce1
[37]:https://github.com/JBlond/php-diff/commit/3a6ef42
[38]:https://github.com/JBlond/php-diff/commit/8b68a5d
[39]:https://github.com/JBlond/php-diff/commit/9207f73
[40]:https://github.com/JBlond/php-diff/commit/8037d99
[41]:https://github.com/JBlond/php-diff/commit/6d165a6
[42]:https://github.com/JBlond/php-diff/commit/e8a3f71
[43]:https://github.com/JBlond/php-diff/commit/27b21eb
[44]:https://github.com/JBlond/php-diff/commit/795fe20
[45]:https://github.com/JBlond/php-diff/commit/fbda2bd
[46]:https://github.com/JBlond/php-diff/commit/5d03eae
[47]:https://github.com/JBlond/php-diff/commit/83b4104
[48]:https://github.com/JBlond/php-diff/commit/4d1b4a0
[49]:https://github.com/JBlond/php-diff/commit/98d993e
[50]:https://github.com/JBlond/php-diff/commit/c11b4ba
[51]:https://github.com/JBlond/php-diff/commit/4c2cbb7
[52]:https://github.com/JBlond/php-diff/commit/3e527d1
[53]:https://github.com/JBlond/php-diff/commit/db259fc
[54]:https://github.com/JBlond/php-diff/commit/7ef67e6
[55]:https://github.com/JBlond/php-diff/commit/b9d0ef6
[56]:https://github.com/JBlond/php-diff/commit/e132cdb
[57]:https://github.com/JBlond/php-diff/commit/639f3cc
[58]:https://github.com/JBlond/php-diff/commit/6bfd4f9
[59]:https://github.com/JBlond/php-diff/commit/ee37a28
[60]:https://github.com/JBlond/php-diff/commit/6f41894
[61]:https://github.com/JBlond/php-diff/commit/4192d8b
[62]:https://github.com/JBlond/php-diff/commit/d7bbe12
[63]:https://github.com/JBlond/php-diff/commit/0c75757
[64]:https://github.com/JBlond/php-diff/commit/0ef6def
[65]:https://github.com/JBlond/php-diff/commit/47d6288
[66]:https://github.com/JBlond/php-diff/commit/e28511b
[67]:https://github.com/JBlond/php-diff/commit/acd12cb
[68]:https://github.com/JBlond/php-diff/commit/02695d5
[69]:https://github.com/JBlond/php-diff/commit/369b146
[70]:https://github.com/JBlond/php-diff/commit/0946d59
[71]:https://github.com/JBlond/php-diff/commit/ccd5a6d
[72]:https://github.com/JBlond/php-diff/commit/cff7db1
[73]:https://github.com/JBlond/php-diff/commit/c64c0cc
[74]:https://github.com/JBlond/php-diff/commit/09aea70
[75]:https://github.com/JBlond/php-diff/commit/4b7a56f
[76]:https://github.com/JBlond/php-diff/commit/ec0918b
[77]:https://github.com/JBlond/php-diff/commit/b5cfbd5
[78]:https://github.com/JBlond/php-diff/commit/c5f6d72
[79]:https://github.com/JBlond/php-diff/commit/b10fd38
[80]:https://github.com/JBlond/php-diff/commit/3ccaa10
[81]:https://github.com/JBlond/php-diff/commit/6e2ad47
[82]:https://github.com/JBlond/php-diff/commit/cef85b5
[83]:https://github.com/JBlond/php-diff/commit/ccfc465
[84]:https://github.com/JBlond/php-diff/commit/6c95ccd
[85]:https://github.com/JBlond/php-diff/commit/75358da
[86]:https://github.com/JBlond/php-diff/commit/c27035a
[87]:https://github.com/JBlond/php-diff/commit/3e4bbe6
[88]:https://github.com/JBlond/php-diff/commit/4512c03
[89]:https://github.com/JBlond/php-diff/commit/d70eaf6
[90]:https://github.com/JBlond/php-diff/commit/7382ee8
[91]:https://github.com/JBlond/php-diff/commit/a239f17
[92]:https://github.com/JBlond/php-diff/commit/ea6a2e4
[93]:https://github.com/JBlond/php-diff/commit/3591515
[94]:https://github.com/JBlond/php-diff/commit/d0cede3
[95]:https://github.com/JBlond/php-diff/commit/bb0eed4
[96]:https://github.com/JBlond/php-diff/commit/576830c
[97]:https://github.com/JBlond/php-diff/commit/73f6776
[98]:https://github.com/JBlond/php-diff/commit/34a032f
[99]:https://github.com/JBlond/php-diff/commit/3bc0839
[100]:https://github.com/JBlond/php-diff/commit/3954a2b
[101]:https://github.com/JBlond/php-diff/commit/77a7b59
[102]:https://github.com/JBlond/php-diff/commit/11ec623
[103]:https://github.com/JBlond/php-diff/commit/b13ff84
[104]:https://github.com/JBlond/php-diff/commit/07da484
[105]:https://github.com/JBlond/php-diff/commit/6fcafe1
[106]:https://github.com/JBlond/php-diff/commit/19634bb
[107]:https://github.com/JBlond/php-diff/commit/0849a1e
[108]:https://github.com/JBlond/php-diff/commit/94c8bd5
[109]:https://github.com/JBlond/php-diff/commit/7d973d3
[110]:https://github.com/JBlond/php-diff/commit/9699b5b
[111]:https://github.com/JBlond/php-diff/commit/8a193c9
[112]:https://github.com/JBlond/php-diff/commit/909e195
[113]:https://github.com/JBlond/php-diff/commit/c9881d3
[114]:https://github.com/JBlond/php-diff/commit/28e1dc0
[115]:https://github.com/JBlond/php-diff/commit/7ec484c
[116]:https://github.com/JBlond/php-diff/commit/1ba255f
[117]:https://github.com/JBlond/php-diff/commit/013f862
[118]:https://github.com/JBlond/php-diff/commit/75f5ce0
[119]:https://github.com/JBlond/php-diff/commit/6ef61bc
[120]:https://github.com/JBlond/php-diff/commit/4dec4ad
[121]:https://github.com/JBlond/php-diff/commit/6b8662e
[122]:https://github.com/JBlond/php-diff/commit/9403eba
[123]:https://github.com/JBlond/php-diff/commit/f494b3a
[124]:https://github.com/JBlond/php-diff/commit/0a6a84f
[125]:https://github.com/JBlond/php-diff/commit/533a6bf
[126]:https://github.com/JBlond/php-diff/commit/fb32453
[127]:https://github.com/JBlond/php-diff/commit/7eba340
[128]:https://github.com/JBlond/php-diff/commit/acbfd7d
[129]:https://github.com/JBlond/php-diff/commit/8a83b39
[130]:https://github.com/JBlond/php-diff/commit/31b4222
[131]:https://github.com/JBlond/php-diff/commit/f5ce6bc
[132]:https://github.com/JBlond/php-diff/commit/02cf114
[133]:https://github.com/JBlond/php-diff/commit/0bf1a08
[134]:https://github.com/JBlond/php-diff/commit/3f44195
[135]:https://github.com/JBlond/php-diff/commit/e88dffb
[136]:https://github.com/JBlond/php-diff/commit/054d249
[137]:https://github.com/JBlond/php-diff/commit/550312a
[138]:https://github.com/JBlond/php-diff/commit/56ed81d
[139]:https://github.com/JBlond/php-diff/commit/42ea73b
[140]:https://github.com/JBlond/php-diff/commit/56bd9c8
[141]:https://github.com/JBlond/php-diff/commit/a947cc7
[142]:https://github.com/JBlond/php-diff/commit/7b9bce9
[143]:https://github.com/JBlond/php-diff/commit/160a3ae
[144]:https://github.com/JBlond/php-diff/commit/962623d
[145]:https://github.com/JBlond/php-diff/commit/40f418f
[146]:https://github.com/JBlond/php-diff/commit/a9635be
[147]:https://github.com/JBlond/php-diff/commit/ff0bb29
[148]:https://github.com/JBlond/php-diff/commit/d62afcf
[149]:https://github.com/JBlond/php-diff/commit/839b0f0
[150]:https://github.com/JBlond/php-diff/commit/975f50e
[151]:https://github.com/JBlond/php-diff/commit/b8993e0
[152]:https://github.com/JBlond/php-diff/commit/69bb28f
[153]:https://github.com/JBlond/php-diff/commit/104e77f
[154]:https://github.com/JBlond/php-diff/commit/b680f9e
[155]:https://github.com/JBlond/php-diff/commit/bd5d3d3
[156]:https://github.com/JBlond/php-diff/commit/6ab28a3
[157]:https://github.com/JBlond/php-diff/commit/2ec33c9
[158]:https://github.com/JBlond/php-diff/commit/0d45b03
[159]:https://github.com/JBlond/php-diff/commit/7f64374
[160]:https://github.com/JBlond/php-diff/commit/54124a6
[161]:https://github.com/JBlond/php-diff/commit/073a478
[162]:https://github.com/JBlond/php-diff/commit/cfa3033
[163]:https://github.com/JBlond/php-diff/commit/188f258
[164]:https://github.com/JBlond/php-diff/commit/ed1f204
[165]:https://github.com/JBlond/php-diff/commit/ff31bb8
[166]:https://github.com/JBlond/php-diff/commit/69a76ca
[167]:https://github.com/JBlond/php-diff/commit/f25347a
[168]:https://github.com/JBlond/php-diff/commit/5b91f82
[169]:https://github.com/JBlond/php-diff/commit/a65ec6b
[170]:https://github.com/JBlond/php-diff/commit/e27241d
[171]:https://github.com/JBlond/php-diff/commit/609c934
[172]:https://github.com/JBlond/php-diff/commit/1f77317
[173]:https://github.com/JBlond/php-diff/commit/f09e779
[174]:https://github.com/JBlond/php-diff/commit/d039186
[175]:https://github.com/JBlond/php-diff/commit/c07c8ac
[176]:https://github.com/JBlond/php-diff/commit/a0323ed
[177]:https://github.com/JBlond/php-diff/commit/bbf90b5
[178]:https://github.com/JBlond/php-diff/commit/2ce76ac
[179]:https://github.com/JBlond/php-diff/commit/c903699
[180]:https://github.com/JBlond/php-diff/commit/1cf2193
[181]:https://github.com/JBlond/php-diff/commit/33cbfa3
[182]:https://github.com/JBlond/php-diff/commit/8bee18d
[183]:https://github.com/JBlond/php-diff/commit/94460ef
[184]:https://github.com/JBlond/php-diff/commit/46528f2
[185]:https://github.com/JBlond/php-diff/commit/06d1b8f
[186]:https://github.com/JBlond/php-diff/commit/b794e3d
